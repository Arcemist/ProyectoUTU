<template>
    <v-card class="solicitudes-registro-card pa-5">
      <v-card-title>
        <h2>Solicitudes de Registro</h2>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="solicitudes"
        item-key="name"
        class="elevation-1"
      >
        <template v-slot:[`item.acciones`]="{ item }">
          <v-icon
            small
            class="mr-2"
            @click="aprobarSolicitud(item)"
          >
            mdi-check
          </v-icon>
          <v-icon
            small
            @click="rechazarSolicitud(item)"
          >
            mdi-close
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
          { text: 'Fecha de Solicitud', value: 'fecha' },
          { text: 'Acciones', value: 'acciones', sortable: false },
        ],
        solicitudes: [
          { name: 'Carlos López', email: 'carlos.lopez@example.com', fecha: '2024-08-17' },
          { name: 'Maria Ruiz', email: 'maria.ruiz@example.com', fecha: '2024-08-16' },
          // Agrega más solicitudes aquí
        ],
      };
    },
    methods: {
      aprobarSolicitud(solicitud) {
        // Lógica para aprobar la solicitud
        alert(`Solicitud de ${solicitud.name} aprobada`);
        this.solicitudes = this.solicitudes.filter(s => s !== solicitud);
      },
      rechazarSolicitud(solicitud) {
        // Lógica para rechazar la solicitud
        if (confirm(`¿Estás seguro de rechazar la solicitud de ${solicitud.name}?`)) {
          this.solicitudes = this.solicitudes.filter(s => s !== solicitud);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .solicitudes-registro-card {
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
  