<template>
  <div>
    <h2 v-resaltar>
      Esta página esta dedicada a explicar y mostrar el funcionamiento de aspectos básicos de Vue.js
    </h2>
    <BotonEliminarse></BotonEliminarse>
    <VentanaArrastrable></VentanaArrastrable>
    <p>
      Cada página tratará sobre un tema, para navegar entre ellas, pulse los botones en la parte
      inferior de la página
    </p>
  </div>
</template>
<script>
import BotonEliminarse from '@/components/botonEliminarse.vue'
import VentanaArrastrable from '@/components/ventana-arrastrable.vue'
const vResaltar = {
  mounted(el) {
    el.style.cursor = 'pointer'
    el.addEventListener('click', () => {
      el.style.backgroundColor = 'yellow'
    })
  },
  unmounted(el) {
    el.removeEventListener('click', () => {})
  },
}
export default {
  name: 'app',
  components: {
    BotonEliminarse,
    VentanaArrastrable,
  },
  directives: {
    resaltar: vResaltar,
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
h2 {
  text-align: center;
}
p {
  text-align: center;
}
</style>
