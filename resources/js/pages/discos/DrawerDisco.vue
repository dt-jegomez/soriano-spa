<template>
    <el-drawer  :visible.sync="drawer" :with-header="true" show-close size="80%" wrapperClosable>
        <div class="row justify-content-center">
            <h4>
                {{title}}
            </h4>
        </div>
        <div class="row">
            <div class="col-lg-8 m-auto">
                <card>
                    <el-form :model="ruleForm" :rules="rules" label-position="left" ref="ruleForm" label-width="220px" class="demo-ruleForm">
                        
                        <el-form-item label="Nombre" prop="nombre">
                            <el-input v-model="ruleForm.nombre" />
                        </el-form-item>

                        <el-form-item label="Álbum" prop="album">
                            <el-input v-model="ruleForm.album" />
                        </el-form-item>
                       
                       
                        <el-form-item label="Artista" prop="artista">
                            <el-input v-model="ruleForm.artista" />
                        </el-form-item>
                       
                       
                        <el-form-item label="Género" prop="genero">
                            <el-input v-model="ruleForm.genero" />
                        </el-form-item>
                        
                        <el-form-item label="Año" prop="anio">
                            <el-date-picker v-model="ruleForm.anio" type="year" placeholder=" Elige un año" />
                        </el-form-item>
                       

                        <el-form-item label="Foto" prop="foto">
                            <el-upload class="upload-demo" ref="upload" action='' :limit="1" accept="image/*" :auto-upload="false" :file-list="fileList" >
                                <el-button slot="trigger" size="small" type="primary">Selecciona un archivo</el-button>
                            </el-upload>
                        </el-form-item>
                        
                        <div class="row justify-content-end mt-5 px-3">
                            <el-button type="primary" @click="submitForm('ruleForm')">Crear</el-button>
                        </div>    
                        
                    </el-form>
                </card>
            </div>
        </div>
    </el-drawer>
</template>

<script>
import firebase from "firebase";
import "firebase/storage";
import Axios from 'axios'

export default {
    name:"DrawerDisco",
    data() {
      return {
        drawer: false,
        title:' Crea nuevo disco',
        tipo: false,
        //
        id: null,
        fileList: [
            // {
            //     name: 'food.jpeg',
            //     url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'
            // }
        ],
        //
        ruleForm:{
            foto:null,
            nombre:'',
            album:'',
            artista:'',
            genero:'',
            anio:'',
        },
        rules: {
            nombre: [
                { required: true, message: 'Por favor ingrese el nombre', trigger: 'blur' },
                { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
            ],
            album: [
                { required: true, message: 'Por favor ingrese el album', trigger: 'blur' },
                { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
            ],
            artista: [
                { required: true, message: 'Por favor ingrese el artista', trigger: 'blur' },
                { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
            ],
            genero: [
                { required: true, message: 'Por favor ingrese el genero', trigger: 'blur' },
                { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
            ],
            anio: [
                { required: true, message: 'Por favor ingrese el año', trigger: 'blur' },
            ],
            foto: [
                // { required: true, message: 'Por favor ingrese el foto', trigger: 'blur' },
                // { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
            ],
            
        },
      };
    },
    methods:{
        toggleCrear(){
            this.drawer = true            
            this.clear()
            this.title=' Crea nuevo disco'
            this.tipo = false
        },
        toggleEditar(row){
            this.clear()
            this.drawer = true            
            this.title=' Editar disco'
            this.tipo = true,
            this.ruleForm = {
                foto: row.foto,
                nombre: row.nombre,
                album: row.album,
                artista: row.artista,
                genero: row.genero,
                anio: row.anio,
            }
            this.id = row.id
        },
        async submitForm(formName){
            const valid = await this.$refs[formName].validate()
                if (valid) {
                    if (this.tipo) {
                        this.editar()
                    }else{
                        this.ruleForm.foto = await this.submitUpload()
                        this.register()
                    }
                } else {
                    console.log('error submit!!');
                    return false;
                }
        },
        async submitUpload() {
            try {
                const { raw } =  await this.$refs.upload.uploadFiles[0];
                const file = raw;
                if (file) {
                const response = await firebase.storage().ref(`${file.name}`).put(file);
                const url = await response.ref.getDownloadURL();
                return url;
                } else {
                    return null
                    console.log("falta el archivo");          
                }
            } catch (error) {
                console.error(error);
            }
        },
        async register(){
            const { data } = await Axios.post('/api/disco',this.ruleForm)
            console.log(data.mensaje);
            this.clear()
            this.$refs.upload.clearFiles
            this.$emit('listar')

        },
        async editar(){
            var foto = await this.submitUpload()
            if (this.ruleForm.foto === null) {
                this.ruleForm.foto = foto
            } else if (foto !== null) {
                this.ruleForm.foto = foto
            }
            const { data } = await Axios.put(`/api/disco/${this.id}`,this.ruleForm)
            console.log(data.mensaje);
            this.clear()
            this.$emit('listar')
        },
        clear(){
            this.ruleForm = {
                foto:null,
                nombre:'',
                album:'',
                artista:'',
                genero:'',
                anio:'',
            }
            this.id = null,
            // this.$refs.upload.clearFiles,
            this.fileList = []

        }
    }
}
</script>