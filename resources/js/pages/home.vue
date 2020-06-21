<template>
	<el-card class="box-card">
		
		<div slot="header" class="clearfix">
			<span>Card name</span>
			<el-button style="float: right; padding: 3px 0" type="text" @click="OpenModal()">
				Crear disco
			</el-button>
		</div>

		<el-table :data="tableData" style="width: 100%" max-height="100%">
			<el-table-column prop="foto" label="Foto de portada" width="200">
				
				<template slot-scope="scope">
					<img :src="scope.row.foto" alt width="50" height="50" />
				</template>

			</el-table-column>

			<el-table-column prop="nombre" label="Nombre" width="200" />

			<el-table-column prop="album" label="Álbum" width="200" />

			
			<el-table-column prop="artista" label="Artista" width="200" />
			
			<el-table-column prop="genero" label="Género" width="200" />
			
			<el-table-column prop="anio" label="Año" width="100" />
			
			<el-table-column align="left" width="300" fixed>

				<template slot="header" slot-scope="scope">
					<el-input v-model="search" size="mini" placeholder=" Escribe para buscar" />
				</template>

				<template slot-scope="scope">
					<el-button size="mini" @click="handleEdit(scope.$index, scope.row)">
						Editar
					</el-button>
					<el-button size="mini" type="danger" @click="handleDelete(scope.$index, scope.row)" >
						Eliminar
					</el-button>
				</template>

			</el-table-column>
		</el-table>
		<DrawerDisco ref="modalDisco" @listar="listarDiscos" />
	</el-card>
</template>

<script>
import axios from "axios";
import DrawerDisco from "./discos/DrawerDisco";
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("home") };
  },

  components: {
    DrawerDisco
  },

  data() {
    return {
      tableDiscos: [],
      search: ""
    };
  },
  computed: {
    tableData() {
      return this.tableDiscos.filter(
        data =>
          !this.search ||
          data.nombre.toLowerCase().includes(this.search.toLowerCase()) ||
          data.album.toLowerCase().includes(this.search.toLowerCase()) ||
          data.artista.toLowerCase().includes(this.search.toLowerCase())
      );
    }
  },
  mounted() {
    this.listarDiscos();
  },
  methods: {
    async listarDiscos() {
      const { data } = await axios(`/api/disco`);
      this.tableDiscos = data;
    },
    handleEdit(index, row) {
		this.$refs.modalDisco.toggleEditar(row)

    },
    async handleDelete(index, row) {
	  const { data } = await axios.delete(`/api/disco/${row.id}`);
	  console.log(data.mensaje);
	  this.listarDiscos();
    },
    OpenModal() {
		this.$refs.modalDisco.toggleCrear()
	}
  }
};
</script>
