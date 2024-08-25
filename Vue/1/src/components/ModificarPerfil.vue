<template>
  <v-card class="modificar-perfil-card pa-5">
    <v-card-title>
      <h2>Modificar Perfil</h2>
    </v-card-title>
    <v-form ref="form" v-model="valid" lazy-validation>
      <v-container>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="name"
              :rules="nameRules"
              label="Nombre"
              required
              outlined
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="email"
              :rules="emailRules"
              label="Correo Electrónico"
              required
              outlined
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="password"
              :rules="passwordRules"
              label="Contraseña"
              type="password"
              required
              outlined
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="confirmPassword"
              :rules="passwordRules"
              label="Confirmar Contraseña"
              type="password"
              required
              outlined
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row class="justify-center">
          <v-col cols="12" md="4">
            <v-btn :disabled="!valid" color="primary" block @click="submit">
              Guardar Cambios
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      valid: false,
      name: '',
      email: '',
      password: '',
      confirmPassword: '',
      nameRules: [
        v => !!v || 'El nombre es obligatorio',
        v => v.length <= 50 || 'El nombre debe tener menos de 50 caracteres',
      ],
      emailRules: [
        v => !!v || 'El correo electrónico es obligatorio',
        v => /.+@.+\..+/.test(v) || 'Ingrese un correo electrónico válido',
      ],
      passwordRules: [
        v => !!v || 'La contraseña es obligatoria',
        v => v.length >= 6 || 'La contraseña debe tener al menos 6 caracteres',
      ],
    };
  },
  methods: {
    submit() {
      if (this.$refs.form.validate()) {
        // Lógica para guardar los cambios
        alert('Cambios guardados exitosamente');
      }
    },
  },
};
</script>

<style scoped>
.modificar-perfil-card {
  background-color: #4444;
  border-radius: 8px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.v-card-title {
  font-family: 'Roboto', sans-serif;
  color: #4CAF50;
}

.v-btn {
  font-weight: bold;
}

.v-text-field {
  background-color: #4444;
  border-radius: 8px;
}
</style>
