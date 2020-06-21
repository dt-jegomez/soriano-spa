<template>
    <section>
        <section class="rol">
            <el-button type="text" @click="open">Agregar nuevo rol</el-button>
        </section>
        <section class="table"> 
            <el-table :data="tableData" style="width: 100%" >
                                
                <el-table-column label="Nombre" prop="nombre" />
                
                <el-table-column align="right">
                                        
                    <template slot-scope="scope">
                        
                        <el-button size="mini" @click="handleEdit(scope.row)"> 
                            Editar
                        </el-button>
                        <el-button size="mini" type="danger" @click="handleDelete(scope.row)">
                            Eliminar
                        </el-button>
                    
                    </template>

                </el-table-column>

            </el-table>
        </section>
    </section>
</template>
<script>
import Axios from 'axios'
// import RolFormulario from './roles/RolFormulario'
export default {
    name:"Roles",
    components:{
        // RolFormulario
    },
    data(){
        return {
            tableData: [],
            id: null
        }
    },
    mounted(){
        this.listarRoles()
    },
    methods:{
        async listarRoles(){
            this.id = null
            const { data } = await Axios(`/api/rol`)
            this.tableData = data
        },
        handleEdit(row) {
            if (row.id === 1) {                
                this.$message({
                    message: 'el rol administador no se puede modificar',
                    type: 'warning'
                });
            }else {
                this.openEditar(row.id)
            }
        },
        async handleDelete(row) {
            if (row.id === 1) {                
                this.$message({
                    message: 'el rol administador no se puede modificar',
                    type: 'warning'
                });
            }else {
               const { data } = await Axios.delete(`/api/rol/${row.id}`)
                console.log(data.mensaje)
                this.listarRoles() 
            }
        },
        open() {
            this.$prompt(' Por favor ingrese el nombre','Crear rol', {
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar',
            }).then(({ value }) => {
                this.registrar(value)
            })
        },
        openEditar(id) {
            this.$prompt(' Por favor ingrese el nuevo nombre','Editar rol', {
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar',
            }).then(({ value }) => {
                this.editar(value,id)
            })
        },
        async registrar(value){
            const { data } = await Axios.post('/api/rol',{nombre:value})
            console.log(data.mensaje)
            this.listarRoles()
        },
        async editar(value,id){
            const { data } = await Axios.put(`/api/rol/${id}`,{nombre:value})
            console.log(data.mensaje)
            this.listarRoles()
        },
    }
}
</script>