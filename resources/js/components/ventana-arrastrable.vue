<template>
  <div class="window" :style="{ left: x + 'px', top: y + 'px' }">
    <div class="titlebar" @mousedown="startDrag">Arrastrar</div>

    <div class="content">Aqui habria contenido</div>
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
    startDrag(e) {
      this.dragging = true
      this.offsetX = e.clientX - this.x
      this.offsetY = e.clientY - this.y

      window.addEventListener('mousemove', this.onDrag)
      window.addEventListener('mouseup', this.stopDrag)
    },

    onDrag(e) {
      if (!this.dragging) return

      this.x = e.clientX - this.offsetX
      this.y = e.clientY - this.offsetY
    },

    stopDrag() {
      this.dragging = false

      window.removeEventListener('mousemove', this.onDrag)
      window.removeEventListener('mouseup', this.stopDrag)
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
