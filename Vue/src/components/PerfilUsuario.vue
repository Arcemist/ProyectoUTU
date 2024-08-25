<template>
    <v-container>
      <v-card class="mx-auto" max-width="400">
        <v-avatar size="120" class="mx-auto">
          <img src="https://cdn.vuetifyjs.com/images/john.png" alt="Avatar">
        </v-avatar>
        <v-card-title class="text-h5 text-center">{{ usuario.nombre }}</v-card-title>
        <v-card-subtitle class="text-center">{{ usuario.email }}</v-card-subtitle>
        <v-card-text>
          <v-list dense>
            <v-list-item>
              <v-list-item-content>
                <v-list-item-title>Rol:</v-list-item-title>
                <v-list-item-subtitle>{{ usuario.rol }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <!-- Agrega más detalles aquí -->
          </v-list>
        </v-card-text>
      </v-card>
    </v-container>
  </template>
  
  <script>
  export default {
    data() {
      return {
        usuario: {
          nombre: 'Juan Pérez',
          email: 'juan.perez@example.com',
          rol: 'Administrador',
        },
      };
    },
  };
  </script>
  
  <style scoped>
  .mx-auto {
    margin-left: auto;
    margin-right: auto;
  }
  
  .text-center {
    text-align: center;
  }
  
  .v-card {
    padding: 16px;
    border-radius: 8px;
  }
  </style>
  