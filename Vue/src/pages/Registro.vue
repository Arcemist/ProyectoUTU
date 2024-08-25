<template>
    <v-container>
      <v-row justify="center">
        <v-col cols="12" sm="8" md="6">
          <v-card>
            <v-card-title class="text-center">
              <h2>Registrarse</h2>
            </v-card-title>
            <v-card-text>
              <v-form @submit.stop.prevent="registrarUsuario">
                <!-- Correo Electrónico -->
                <v-text-field
                  label="Correo Electrónico"
                  v-model="correo"
                  prepend-icon="mdi-email"
                  outlined
                ></v-text-field>
  
                <!-- Nombre de Usuario -->
                <v-text-field
                  label="Nombre de Usuario"
                  v-model="usuario"
                  prepend-icon="mdi-account"
                  outlined
                ></v-text-field>
  
                <!-- Número de Teléfono -->
                <v-text-field
                  label="Número de Teléfono"
                  v-model="telefono"
                  prepend-icon="mdi-phone"
                  outlined
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
                ></v-text-field>
  
                <!-- Confirmar Contraseña -->
                <v-text-field
                  :type="mostrarContrasena ? 'text' : 'password'"
                  label="Confirmar Contraseña"
                  v-model="confirmarContrasena"
                  prepend-icon="mdi-lock"
                  outlined
                ></v-text-field>
  
                <!-- Botón de Registro -->
                <v-btn @click="registrarUsuario" color="primary" type="submit" >Registrar</v-btn>
              </v-form>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script setup>
  import { useRouter } from "vue-router"
  import { ref } from "vue"
  const router = useRouter()
  const correo = ref("")
  const usuario = ref("")
  const telefono = ref("")
  const contrasena = ref("")
  const confirmarContrasena = ref("")
  const  registrarUsuario = ()=> {
      // Suponiendo que la validación de los campos es correcta
      // Código para registrar al usuario en la base de datos
     // await axios.post()
      /* Redirigir a la página del administrador
      .then(respuesta => {respuesta.json()})
      .then(datos => {*/
       // datos.json()
        router.push("/AdminPage")
      }
    /*)  
    .catch(error => console.log(error))
    }*/
    

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
  