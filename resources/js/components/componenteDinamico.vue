<template>
  <div>
    <div class="texto">
      <h3>{{ titulo }}</h3>
      <p>{{ parrafo }}</p>
    </div>

    <imagen :url="enlace" :texto="alt" :carpeta="carpetaGuardado"></imagen>
  </div>
</template>
<script>
import imagen from './imagen.vue'

export default {
  name: 'componenteDinamico',
  props: {
    enlace: String,
    alt: String,
    carpetaGuardado: String,
    titulo: String,
    parrafo: String,
  },
  components: {
    imagen,
  },
}
</script>
<style scoped>
div {
  display: flex;
  flex-direction: row;
}
.texto {
  flex-direction: column;
}
</style>
