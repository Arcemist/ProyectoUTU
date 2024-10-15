<template>
    <v-container>
      <v-card>
        <v-card-title>Solicitudes de Registro</v-card-title>
  
        <v-list>
          <v-list-item v-for="(solicitud, index) in solicitudes" :key="index">
            <v-list-item-content>
              <v-list-item-title>Usuario solicitó Registrarse</v-list-item-title>
            </v-list-item-content>
  
            <v-list-item-action>
              <v-btn icon @click="aceptarSolicitud(index)">
                <v-icon color="green">mdi-check-circle</v-icon>
              </v-btn>
              <v-btn icon @click="rechazarSolicitud(index)">
                <v-icon color="red">mdi-cancel</v-icon>
              </v-btn>
            </v-list-item-action>
          </v-list-item>
        </v-list>
      </v-card>
  
      <!-- Snackbar para notificaciones -->
      <v-snackbar v-model="snackbar" :timeout="3000" top>
        {{ mensajeNotificacion }}
        <v-btn text @click="snackbar = false">Cerrar</v-btn>
      </v-snackbar>
    </v-container>
  </template>
  
  <script>
  export default {
    data() {
      return {
        solicitudes: [
          // Simulando solicitudes de registro
          { nombre: 'Usuario 1' },
          { nombre: 'Usuario 2' },
          { nombre: 'Usuario 3' }
        ],
        snackbar: false, // Para controlar la visibilidad de la notificación
        mensajeNotificacion: "", // Mensaje a mostrar en la notificación
      };
    },
    methods: {
      aceptarSolicitud(index) {
        // Lógica para aceptar la solicitud
        this.mensajeNotificacion = `Solicitud de ${this.solicitudes[index].nombre} aceptada.`;
        this.snackbar = true;
        this.solicitudes.splice(index, 1); // Eliminar de la lista
      },
      rechazarSolicitud(index) {
        // Lógica para rechazar la solicitud
        this.mensajeNotificacion = `Solicitud de ${this.solicitudes[index].nombre} rechazada.`;
        this.snackbar = true;
        this.solicitudes.splice(index, 1); // Eliminar de la lista
      }
    }
  };
  </script>
  