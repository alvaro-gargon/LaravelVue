<template>
  <div>
    <button @click="version1">Mostrar Componente 1</button>
    <button @click="version2">Mostrar Componente 2</button>
    <button @click="version3">Mostrar Componente 3</button>
    <component :is="componenteActual" :key="componenteActual" v-bind="propsComponente"></component>
  </div>
</template>

<script>
import componente1 from './componenteDinamico.vue'
import componente3 from './componenteDinamico1.vue'

export default {
  name: 'componente-dinamico-padre',
  components: {
    componente1,
    componente3,
  },
  data() {
    return {
      componenteActual: 'componente1',
      propsComponente: {},
    }
  },
  mounted() {
    this.version1();
  },
  methods: {
    version1() {
      this.componenteActual = componente1
      this.propsComponente = {
        enlace: '/leon.jpg',
        alt: 'foto leon',
        carpetaGuardado: 'public',
        titulo: 'Esto se corresponde con el PRIMER componente',
        parrafo: 'Y esto es una foto de un leon',
      }
    },

    version2() {
      this.componenteActual = componente1
      this.propsComponente = {
        enlace: '/Gacela.jpg',
        alt: 'foto gacela',
        carpetaGuardado: 'public',
        titulo: 'Esto se corresponde con el SEGUNDO componente',
        parrafo: 'Y esto es una foto de una gacela',
      }
    },
    version3() {
      this.componenteActual = componente3
      this.propsComponente = {}
    },
  },
}
</script>
<style scoped>
div {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
</style>
