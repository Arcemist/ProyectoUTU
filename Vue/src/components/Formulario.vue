<template>
  <div class="w-screen h-screen bg-green tarjeta">
  <v-text-field class="text-center entrada" v-for="(ent,index) in entradas" :key="index"
  v-model="ent.valor" :label="ent.etiqueta"
  :type="ent.tipo">
  </v-text-field>
  </div>

</template>

<script setup>
import {ref} from "vue"
const entradas =ref([
  {etiqueta:"Nombre",valor:"",clase:"entrada",tipo:"text"},
  {etiqueta:"Correo Electrónico",valor:"",tipo:"email"},
  {etiqueta:"Cédula de Identidad",valor:"",tipo:"numbers"},
  {etiqueta:"Dirección",valor:"",tipo:"text"}
])
</script>

<style scoped>
.tarjeta{
  margin: auto;
  width: 70%;
  height: 30vh;
  margin-top: 10vh;
  background-color: brown;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-content: space-center;
}
.entrada{
  width: 51%;

}
.formulario {
  max-width: 400px;
}
.formulario div {
  margin-bottom: 15px;
}

</style>
