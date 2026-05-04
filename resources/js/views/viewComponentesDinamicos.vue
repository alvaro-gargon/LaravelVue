<template>
  <h2>Aqui tenemos un componente dinamico, con dos componentes dentro</h2>
  <componenteDinamicoPadre></componenteDinamicoPadre>
</template>
<script>
import componenteDinamicoPadre from '@/components/componenteDinamicoPadre.vue'
export default {
  name: 'componenesDinamicos',
  components: {
    componenteDinamicoPadre,
  },
}
</script>
<style scoped>
  h2{
    display: flex;
    justify-content: center;
  }
</style>
