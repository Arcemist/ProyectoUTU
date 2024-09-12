<template>
  <div class="w-screen h-screen bg-green tarjeta">
  <v-text-field class="text-center entrada" v-for="(ent,index) in entradas" :key="index"
  v-model="ent.valor" :label="ent.etiqueta"
  :type="ent.tipo">
  </v-text-field>
  </div>
  <div class="text-center">
  <v-btn size="large"
color="primary"
variant="outlined">Enviar</v-btn>
</div>
</template>

<script setup>
import {ref} from "vue"
const entradas =ref([
  {etiqueta:"Nombre Completo",valor:"",clase:"entrada",tipo:"text"},
  {etiqueta:"Cédula de Identidad",valor:"",tipo:"numbers"},
  {etiqueta:"Dirección",valor:"",tipo:"text"},
  {etiqueta:"Teléfono",valor:"",tipo:"numbers"},
  {etiqueta:"Profesión",valor:"",tipo:"text"},
  {etiqueta:"Cargo",valor:"",tipo:"text"},
  {etiqueta:"Horario",valor:"",tipo:"text"},
  {etiqueta:"Función que desempeña",valor:"",tipo:"text"},
])
</script>

<style scoped>
.tarjeta{
  margin: auto;
  width: 70%;
  height: 30vh;
  margin-top: 5vh;
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
