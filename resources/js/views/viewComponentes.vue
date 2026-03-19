<template>
  <div class="row">
    <div class="divComponente">
      <botonComponente :id="-7"></botonComponente>
    </div>
    <div>
      <imagen url="/botonComponente.PNG" texto="Foto del componente" carpeta="public"></imagen>
      <div class="columna">
        <p>
          El validator en los props de los componentes solo lanzan un warning a consola sino se
          cumple la condicion, pero el valor se toma igualmente.
        </p>
        <p>
          Para evitar esto, se usa un computed, que no son más que variables, pero que no se
          calculan cada vez que las usas. Utiles para guardar informacion que depende de operaciones
          costosas.
        </p>
        <p>
          El "v-model" sirve para reflejar el valor de una variable almacenada en "data()" y, sobre
          todo, para que si escriben en ese input,
          <strong>se cambie el valor de esa variable</strong>
        </p>
        <p>
          También hacemos uso del "v-show", una directiva (todo lo que empieza por "v-"" son
          directivas) que, dado una variable del "data()", si su valor es true, se mostrará y si es
          falso, se hara invisible (es decir => display:hidden). Para cambiar el valor de esa
          variable, utilizamos el método "acepto" que se ejecutará cuando se haga click en el botón
        </p>
      </div>
    </div>
  </div>
</template>
<script>
import botonComponente from '@/components/botonComponente.vue'
import imagen from '@/components/imagen.vue'
export default {
  name: 'componentes',
  components: {
    botonComponente,
    imagen,
  },
}
</script>
<style scoped>
.row,
.row div:nth-of-type(2) {
  display: flex;
  flex-direction: row;
}
.row div:nth-of-type(1) {
  width: 30%;
}
.row div:nth-of-type(1) article {
  align-items: center;
  justify-self: center;
}
.row div:nth-of-type(2) {
  width: 70%;
}

.columna {
  flex-direction: column !important;
}
p {
  font-size: 1.1rem;
}
.divComponente {
  margin-left: 50px;
}
</style>
