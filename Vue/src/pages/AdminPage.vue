<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <!-- Barra superior -->
      <v-toolbar-title>Administrador</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>mdi-home</v-icon>
      </v-btn>
      
      <!-- Menú desplegable para notificaciones -->
      <v-menu
        offset-y
        bottom
        right
        transition="scale-transition"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon v-bind="attrs" v-on="on">
            <v-icon>mdi-bell</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item v-for="(notificacion, index) in notificaciones" :key="index">
            <v-list-item-content>
              <v-list-item-title>{{ notificacion.titulo }}</v-list-item-title>
              <v-list-item-subtitle>{{ notificacion.detalle }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-menu>

      <v-btn icon @click="mostrarPrefilUsuario">
        <v-icon>mdi-account</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <v-container>
        <v-row>
          <!-- Columna Izquierda -->
          <v-col cols="2">
            <v-card class="sidebar">
              <v-list>
                <v-list-item @click="mostrarCalendario">
                  <v-list-item-content>
                    <v-list-item-title>Calendario</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item @click="mostrarModificarPerfil">
                  <v-list-item-content>
                    <v-list-item-title>Modificar Perfil</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item @click="mostrarUsuariosRegistrados">
                  <v-list-item-content>
                    <v-list-item-title>Usuarios Registrados</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item @click="mostrarSolicitudesRegistro">
                  <v-list-item-content>
                    <v-list-item-title>Solicitudes de Registro</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <!-- Otras opciones -->
              </v-list>
            </v-card>
          </v-col>

          <!-- Contenido Principal -->
          <v-col cols="10">
            <component
              :is="vistaActual"
              @mostrar-modificar-perfil="mostrarModificarPerfil"
            ></component>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>
  
  <script>
  import Calendario from '@/components/Calendario.vue';
  import ModificarPerfil from '@/components/ModificarPerfil.vue';
  import SolicitudesRegistro from '@/components/SolicitudesRegistro.vue';
  import UsuariosRegistrados from '@/components/UsuariosRegistrados.vue';
  import PerfilUsuario from '@/components/PerfilUsuario.vue';
  
  export default {
    components: {
      Calendario,
      ModificarPerfil,
      UsuariosRegistrados,
      SolicitudesRegistro,
      PerfilUsuario,
    },
    data() {
      return {
        vistaActual: 'Calendario',
        notificaciones: [
        { titulo: 'Notificación 1', detalle: 'Detalles de la notificación 1' },
        { titulo: 'Notificación 2', detalle: 'Detalles de la notificación 2' },
        // Agrega más notificaciones aquí
      ],
      }
    },
    methods: {
      mostrarCalendario() {
        this.vistaActual = 'Calendario';
      },
      mostrarModificarPerfil() {
        this.vistaActual = 'ModificarPerfil';
      },
      mostrarUsuariosRegistrados() {
        this.vistaActual = 'UsuariosRegistrados';
      },
      mostrarSolicitudesRegistro() {
        this.vistaActual = 'SolicitudesRegistro';
      },
      mostrarPrefilUsuario() {
        this.vistaActual = 'PerfilUsuario';
      },
    },
  };
  </script>
  
  <style scoped>
  .sidebar {
    background-color: #444444;
    padding: 10px;
    border-radius: 8px;
  }
  
  .v-application .v-toolbar {
    background-color: #4CAF50 !important;
  }
  
  .v-application .v-btn {
    color: #444444 !important;
  }
  </style>
  