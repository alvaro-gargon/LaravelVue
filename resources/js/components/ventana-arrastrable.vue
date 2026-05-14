<template>
  <div class="window" :style="{ left: x + 'px', top: y + 'px' }">
    <div class="titlebar" @click="toogleDrag">Arrastrar</div>

    <div class="content">Aqui habria contenido</div>
    <!-- Punto de agarre -->
    <div class="grab-point" :style="{
      left: (x + offsetX - 6) + 'px',
      top: (y + offsetY - 6) + 'px'
    }"></div>
  </div>
</template>

<script>
export default {
  name: 'ventana-arrastrable',
  data() {
    return {
      x: 200,
      y: 150,
      dragging: false,
      offsetX: 0,
      offsetY: 0,
    }
  },

  methods: {
    toogleDrag(e) {
      if(this.dragging){
        this.stopDrag()
        return
      }
      const rect=e.currentTarget.getBoundingClientRect()
      this.offsetX = e.clientX - rect.left
      this.offsetY = e.clientY - rect.top
      this.dragging = true

      window.addEventListener('mousemove', this.onDrag)
      // setTimeout(() => {
      //   window.addEventListener('click', this.stopDrag)
      // }, 0) este setTimeout() se añadio para que no detectará el click de iniciar el movimiento a la vez que el de pararlo
    },

    onDrag(e) {
      if (!this.dragging) return

      this.x = e.clientX - this.offsetX
      this.y = e.clientY - this.offsetY //esta resta es para que el elemento se mueva por donde lo has agarrado y no por la esquina superior izquierda
    },

    stopDrag() {
      this.dragging = false

      window.removeEventListener('mousemove', this.onDrag)
      // window.removeEventListener('click', this.stopDrag)
    },
  },
}
</script>

<style scoped>
* {
  box-sizing: border-box;
}

.window {
  position: absolute;
  width: 300px;
  border: 1px solid #aaa;
  background: white;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.grab-point {
  position: fixed;
  width: 12px;
  height: 12px;
  background: red;
  border-radius: 50%;
  pointer-events: none;
  z-index: 9999;
}

.titlebar {
  background: #444;
  color: white;
  padding: 8px;
  width: 100%;
  text-align: center;
  cursor: grab;
  user-select: none;
}

.content {
  padding: 16px;
}
</style>
