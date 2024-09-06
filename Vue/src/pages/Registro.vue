<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6">
        <v-card>
          <v-card-title class="text-center">
            <h2>Registrarse</h2>
          </v-card-title>
          <v-card-text>
            <v-form ref="form">
              <!-- Correo Electrónico -->
              <v-text-field
                label="Correo Electrónico"
                v-model="correo"
                prepend-icon="mdi-email"
                outlined
                :rules="[v => !!v || 'El correo es obligatorio', v => /.+@.+\..+/.test(v) || 'El correo debe ser válido']"
                required
              ></v-text-field>

              <!-- Nombre de Usuario -->
              <v-text-field
                label="Nombre de Usuario"
                v-model="usuario"
                prepend-icon="mdi-account"
                outlined
                :rules="[v => !!v || 'El nombre de usuario es obligatorio']"
                required
              ></v-text-field>

              <!-- Número de Teléfono -->
              <v-text-field
                label="Número de Teléfono"
                v-model="telefono"
                prepend-icon="mdi-phone"
                outlined
                :rules="[v => !!v || 'El número de teléfono es obligatorio', v => /^\d+$/.test(v) || 'El número debe ser válido']"
                required
              ></v-text-field>

              <!-- Contraseña -->
              <v-text-field
                :type="mostrarContrasena ? 'text' : 'password'"
                label="Contraseña"
                v-model="contrasena"
                prepend-icon="mdi-lock"
                outlined
                :append-icon="mostrarContrasena ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="mostrarContrasena = !mostrarContrasena"
                :rules="[v => !!v || 'La contraseña es obligatoria', v => v.length >= 6 || 'La contraseña debe tener al menos 6 caracteres']"
                required
              ></v-text-field>

              <!-- Confirmar Contraseña -->
              <v-text-field
                :type="mostrarContrasena ? 'text' : 'password'"
                label="Confirmar Contraseña"
                v-model="confirmarContrasena"
                prepend-icon="mdi-lock"
                outlined
                :rules="[v => !!v || 'Debe confirmar la contraseña', v => v === contrasena || 'Las contraseñas no coinciden']"
                required
              ></v-text-field>

              <!-- Botón de Registro -->
              <v-btn :disabled="!formValido" @click="registrarUsuario" color="primary" type="submit">
                Registrar
              </v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
import { useRouter } from "vue-router"
import { ref, computed } from "vue"
const router = useRouter()
const correo = ref("")
const usuario = ref("")
const telefono = ref("")
const contrasena = ref("")
const confirmarContrasena = ref("")
const mostrarContrasena = ref(false)
const form = ref(null)

// Computed property para verificar si el formulario es válido
const formValido = computed(() => {
  return (
    correo.value &&
    /.+@.+\..+/.test(correo.value) &&
    usuario.value &&
    telefono.value &&
    /^\d+$/.test(telefono.value) &&
    contrasena.value &&
    contrasena.value.length >= 6 &&
    confirmarContrasena.value &&
    confirmarContrasena.value === contrasena.value
  )
})

const registrarUsuario = () => {
  if (formValido.value) {
    // Si el formulario es válido, redirigir al usuario a la página del administrador
    router.push("/AdminPage")
  }
}
</script>

<style scoped>
.v-card {
  border: 2px solid black;
  padding: 16px;
}

.v-card-title {
  margin-bottom: 16px;
}

.v-btn {
  margin-top: 24px;
}
</style>
