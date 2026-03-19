<template>
  <!-- Este componente es un articulo con un boton que desaparece al clicarlo, y dos ids, uno proporcionado por el usuario y otro saneado -->
  <article>
    <h3>Esto que esta viendo es un componente</h3>
    <button @click="acepto" v-show="aceptar">Aceptar</button><br />
    <input v-model="nombre" />
    <button @click="guardar">Guardar cambios</button><br />
    <p>Mi nombre es {{ nombre }}</p>
    <p>Si tuviera el id que la gente querria... : {{ id }}</p>
    <p>Si fuera el id que yo quiero ser... : {{ idSaneado }}</p>
  </article>
</template>
<script>
import { updateUsuario } from '@/services/apis.js'
import { getUsuario } from '@/services/apis.js'
export default {
  name: 'botonComponente',
  props: {
    id: {
      type: Number,
      default: 1,
      required: false,
    },
  },
  data() {
    
    return {
      nombre: '',
      aceptar: true,
    }
  },
  async mounted(){
    const res = await getUsuario(1);
    this.nombre=res.nombre;
  },
  computed: {
    idSaneado() {
      return this.id < 0 ? this.id * -1 : this.id
    },
  },
  methods: {
    acepto() {
      this.aceptar = false
    },
    async guardar() {
      const res = await updateUsuario(1, {nombre:this.nombre})
    },
  },
}
</script>
<style scoped>
article {
  display: block;
  width: 300px;
  height: 300px;
  background-color: antiquewhite;
  color: grey;
  border-radius: 5px;
}
article button {
  background-color: aqua;
  border-radius: 5px;
  color: black;
}
</style>
