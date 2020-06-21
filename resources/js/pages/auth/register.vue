<template>
  <div class="row">
    <div class="col-lg-8 m-auto">
      <card v-if="mustVerifyEmail" :title="$t('register')">
        <div class="alert alert-success" role="alert">
          {{ $t('verify_email_address') }}
        </div>
      </card>
      <card v-else :title="$t('register')">
        <!-- <form @submit.prevent="register" @keydown="form.onKeydown($event)"> -->
          <el-form :model="ruleForm" :rules="rules" label-position="left" ref="ruleForm" label-width="220px" class="demo-ruleForm">
            
            <el-form-item label="Nombre" prop="nombre_completo">
              <el-input v-model="ruleForm.nombre_completo" />
            </el-form-item>

            <el-form-item label="correo electronico" prop="email">
              <el-input v-model="ruleForm.email" />
            </el-form-item>

            <el-form-item label="telefono" prop="telefono">
              <el-input v-model="ruleForm.telefono" />
            </el-form-item>

            <el-form-item label="contraseña" prop="password">
              <el-input type="password" v-model="ruleForm.password" autocomplete="off" />
            </el-form-item>

            <el-form-item label="Confirmar" prop="checkPass">
              <el-input type="password" v-model="ruleForm.checkPass" autocomplete="off" />
            </el-form-item>

            <el-form-item label="Foto de perfil">
              <el-upload
              class="upload-demo"
              ref="upload"
              action=''
              :limit="1"
              accept="image/*"
              :auto-upload="false">
              <el-button slot="trigger" size="small" type="primary">Selecciona un archivo</el-button>
              <div slot="tip" class="el-upload__tip">Solo archivos de imagen</div>
            </el-upload>
            </el-form-item>

            <el-form-item label="Intereses">
                <el-select v-model="ruleForm.intereses" multiple placeholder="Seleccione">
                <el-option
                  v-for="(item, index) in options"
                  :key="index"
                  :label="item"
                  :value="item">
                </el-option>
              </el-select>
            </el-form-item>
            
            <el-form-item>
              <el-button type="primary" @click="submitForm('ruleForm')">Create</el-button>
            </el-form-item>
          </el-form>
      </card>
    </div>
  </div>
</template>

<script>
import firebase from "firebase";
import "firebase/storage";
import Axios from 'axios'
// import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('register') }
  },

  data() {
    var validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the password'));
      } else {
        if (this.ruleForm.checkPass !== '') {
          this.$refs.ruleForm.validateField('checkPass');
        }
        callback();
      }
    };
    var validatePass2 = (rule, value, callback) => {
      console.log('validatePass2',value);
      
      if (value === '') {
        callback(new Error('Please input the password again'));
      } else if (value !== this.ruleForm.password) {
        console.log('que esto',value);
        
        callback(new Error('Two inputs don\'t match!'));
      } else {
        callback();
      }
    };
    return {
      ruleForm:{
        nombre_completo:'',
        email:'',
        telefono:'',
        foto:null,
        rol_id:1,
        intereses:[],
        password: '',
        checkPass: '',
      },
      options:[],
      //
      mustVerifyEmail: false,
      //
      rules: {
        nombre_completo: [
          { required: true, message: 'Por favor ingrese el nombre', trigger: 'blur' },
          { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' }
        ],
        email: [
          { required: true, message: 'Por favor ingrese el correo electronico', trigger: 'blur' },
          { min: 1, max: 255, message: 'La longitud debe ser de 3 a 255', trigger: 'blur' },
          // { email, message: 'email', trigger: 'blur' },
          {type: "email",  message: "no es un correo valido", trigger: 'blur'}
        ],
        rol_id: [
          { required: true, message: 'Por favor ingrese el rol', trigger: 'change' }
        ],
        password: [
            { validator: validatePass, trigger: 'blur' }
          ],
        checkPass: [
          { validator: validatePass2, trigger: 'blur' }
        ],
      },
    }
  },
  mounted(){
    this.listarInterese()
  },
  methods: {
      async submitForm(formName) {
        const valid = await this.$refs[formName].validate()
            if (valid) {
              this.ruleForm.foto = await this.submitUpload()
              this.register()
            } else {
              console.log('error submit!!');
              return false;
            }
      },

    async register () {
      // Register the user.
      const { data } = await Axios.post('/api/register',this.ruleForm)

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } 
      else {
        // Log in the user.
        const { data: { token } } = await Axios.post('/api/login',this.ruleForm)

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    },
    async submitUpload() {
      try {
        const { raw } =  await this.$refs.upload.uploadFiles[0];
        const file = raw;
        if (file) {
          const response = await firebase.storage().ref(`${file.name}`).put(file);
          const url = await response.ref.getDownloadURL();
          console.log("archivo disponible en ", url);
          return url;
        } else {
          return null
          console.log("falta el archivo");          
        }
      } catch (error) {
        console.error(error);
      }
    },
    async listarInterese(){
        const { data } = await Axios(`/api/listado-interes`)
        this.options = data 
    }
  }
}
</script>
