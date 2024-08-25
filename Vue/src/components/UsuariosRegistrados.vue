<template>
    <v-card class="usuarios-registrados-card pa-5">
      <v-card-title>
        <h2>Usuarios Registrados</h2>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="usuarios"
        item-key="name"
        class="elevation-1"
      >
        <template v-slot:[`item.acciones`]="{ item }">
          <v-icon
            small
            class="mr-2"
            @click="verUsuario(item)"
          >
            mdi-eye
          </v-icon>
          <v-icon
            small
            class="mr-2"
            @click="modificarUsuario(item)"
          >
            mdi-pencil
          </v-icon>
          <v-icon
            small
            @click="eliminarUsuario(item)"
          >
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-card>
  </template>
  
  <script>
  export default {
    data() {
      return {
        headers: [
          { text: 'Nombre', value: 'name' },
          { text: 'Correo Electrónico', value: 'email' },
          { text: 'Rol', value: 'rol' },
          { text: 'Acciones', value: 'acciones', sortable: false },
        ],
        usuarios: [
          { name: 'Juan Pérez', email: 'juan.perez@example.com', rol: 'Administrador' },
          { name: 'Ana Gómez', email: 'ana.gomez@example.com', rol: 'Usuario' },
          // Agrega más usuarios aquí
        ],
      };
    },
    methods: {
      verUsuario(usuario) {
        // Lógica para ver los detalles del usuario
        alert(`Ver detalles de ${usuario.name}`);
      },
      modificarUsuario(usuario) {
        // Lógica para modificar el usuario
        alert(`Modificar a ${usuario.name}`);
      },
      eliminarUsuario(usuario) {
        // Lógica para eliminar el usuario
        if (confirm(`¿Estás seguro de eliminar a ${usuario.name}?`)) {
          this.usuarios = this.usuarios.filter(u => u !== usuario);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .usuarios-registrados-card {
    background-color: #4444;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
  }
  
  .v-card-title {
    font-family: 'Roboto', sans-serif;
    color: #4CAF50;
  }
  
  .v-data-table {
    background-color: #4444;
    border-radius: 8px;
  }
  </style>
  