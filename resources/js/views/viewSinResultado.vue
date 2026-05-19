<!-- views/NotFound.vue -->
<template>
  <div class="nf-wrap">
    <div class="nf-grid"></div>

    <div class="nf-number">4<span>0</span>4</div>

    <span class="nf-badge">Página no encontrada</span>

    <h1 class="nf-title">Vaya, esto no debería estar aquí.</h1>

    <p class="nf-sub">
      La dirección que has escrito no existe o ha sido movida.<br>
      Comprueba la URL o regresa al inicio.
    </p>

    <RouterLink to="/" class="nf-btn">
      <i class="ti ti-arrow-left"></i>
      Volver al inicio
    </RouterLink>
  </div>
</template>

<script setup>
// No necesita lógica
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Instrument+Serif:ital@0;1&display=swap');

.nf-wrap {
  min-height: 80vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 3rem 1rem;
  position: relative;
  overflow: hidden;
}

.nf-grid {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(#e5e5e5 1px, transparent 1px),
    linear-gradient(90deg, #e5e5e5 1px, transparent 1px);
  background-size: 40px 40px;
  opacity: 0.5;
  pointer-events: none;
}

.nf-number {
  font-family: 'Syne', sans-serif;
  font-weight: 800;
  font-size: 160px;
  line-height: 1;
  letter-spacing: -6px;
  color: transparent;
  -webkit-text-stroke: 1.5px #ccc;
  animation: drift 0.7s ease-out both;
}
.nf-number span {
  color: #111;
  -webkit-text-stroke: 0;
}

.nf-badge {
  font-family: 'Syne', sans-serif;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #888;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 5px 14px;
  margin-bottom: 1.5rem;
  display: inline-block;
  animation: fadeUp 0.5s 0.2s ease-out both;
}

.nf-title {
  font-family: 'Instrument Serif', serif;
  font-style: italic;
  font-size: 32px;
  font-weight: 400;
  color: #111;
  margin: 0.75rem 0 0.5rem;
  line-height: 1.2;
  animation: fadeUp 0.5s 0.3s ease-out both;
}

.nf-sub {
  font-family: 'Syne', sans-serif;
  font-size: 14px;
  color: #666;
  max-width: 320px;
  line-height: 1.7;
  margin: 0 auto 2rem;
  animation: fadeUp 0.5s 0.4s ease-out both;
}

.nf-btn {
  font-family: 'Syne', sans-serif;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: #111;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 12px 28px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  transition: background 0.15s, transform 0.1s;
  animation: fadeUp 0.5s 0.5s ease-out both;
}
.nf-btn:hover { background: #f5f5f5; }
.nf-btn:active { transform: scale(0.97); }

@keyframes drift {
  from { opacity: 0; transform: translateY(-16px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
</style>