<template>
  <!-- Vista donde se mostraran un menu con botones diferentes dependiendo del usuario -->
  <div class="centrar">
    <nav>
      <h2>{{ nombre }}</h2>
      <button v-for="item in menu" :key="item.id">
        {{ item.texto }}
      </button>
    </nav>
    <label>Elige tu usuario</label>
    <select v-model="nombre">
      <option value="admin">admin</option>
      <option value="editor">editor</option>
      <option value="invitado">invitado</option>
    </select>
  </div>
</template>

<script>
// se importa la funcion obtener usuarios (recoge los usuarios del Json)
import { obtenerUsuarios } from '@/services/apis.js'

export default {
  name: 'Menu',

  data() {
    return {
      menu: [],
      nombre: 'admin',
      usuarios: [], // guardamos todos los usuarios una vez
    }
  },

  //cuando se tengan todos los usuarios, los guardamos en el array en data y actualizamos el menu
  async mounted() {
    const data = await obtenerUsuarios()
    this.usuarios = data.usuarios
    this.actualizarMenu()
  },

  watch: {
    // cada vez que cambie "nombre", actualizamos el menú
    nombre() {
      this.actualizarMenu()
    },
  },

  methods: {
    actualizarMenu() {
      //u representa cada usuario en el array
      //find compara cada usuario con el nombre seleccionado en el select
      //si en algun momento lo encuentra, devuelve true
      const usuario = this.usuarios.find((u) => u.nombre === this.nombre)
      //si el usuario existe, osea la operacion anterior salio true, se asigna el menu del usuario al menu que sale en pantalla
      this.menu = usuario ? usuario.menu : []
    },
  },
}
</script>
<style scoped>
.centrar {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
h2 {
  text-align: center;
}
button {
  background-color: orange;
  /* display: block; */
  width: 100px;
  height: 50px;
  border-radius: 10px;
  margin: 10px;
}
</style>
