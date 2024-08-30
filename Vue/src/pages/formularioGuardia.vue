<template>
  <div class="formulario bg-green">
    <form @submit.prevent="submitForm">
      <div>
        <label for="nombre">Nombre:</label>
        <input type="text" v-model="formData.nombre" id="nombre" required />
      </div>
      <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" v-model="formData.email" id="email" required />
      </div>
      <div>
        <label for="ci">Cédula de Identidad (CI):</label>
        <input type="text" v-model="formData.ci" id="ci" required />
      </div>
      <div>
      <label for="contraseña">Contraseña:</label>
        <input type="password" v-model="formData.contraseña" id="contraseña" required />
      </div>
      <button type="submit">Enviar</button>
    </form>
    <div v-if="submitted">
      <p>Formulario enviado con éxito!</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        nombre: '',
        email: '',
        ci: '' ,
        contraseña: ''
      },
      submitted: false
    };
  },
  methods: {
    submitForm() {
      localStorage.setItem('formData', JSON.stringify(this.formData));
      this.submitted = true;
    }
  }
};
</script>

<style scoped>
.formulario {
  max-width: 400px;
  margin: 0 auto;
}
.formulario div {
  margin-bottom: 15px;
}
</style>
