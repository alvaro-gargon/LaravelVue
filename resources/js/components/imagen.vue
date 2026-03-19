<template>
  <figure>
    <img :src="url" :alt="texto" />
    <figcaption>Esta imagen esta en la carpeta {{ carpeta }}</figcaption>
  </figure>
</template>
<script>
export default {
  name: 'imagen',
  props: {
    url: String,
    texto: String,
    carpeta: String,
  },
}
</script>
<style scoped>
img {
  display: block;
  width: 500px;
  height: 600px;
}
</style>
