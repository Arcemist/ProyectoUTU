<template>
    <v-app>
      <v-app-bar app color="primary" dark>
        <!-- Barra superior -->
        <v-toolbar-title>Administrador</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon>
          <v-icon>mdi-home</v-icon>
        </v-btn>
        <v-btn icon>
          <v-icon>mdi-bell</v-icon>
        </v-btn>
        <v-btn icon>
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
                    <v-lis-item-content>
                      <v-list-item-title>Usuarios Registrados</v-list-item-title>
                    </v-lis-item-content>
                 </v-list-item>
                 <v-list-item @click="mostrarSolicitudesRegistro">
                    <v-lis-item-content>
                      <v-list-item-title>Solicitudes de Registro</v-list-item-title>
                    </v-lis-item-content>
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
  
  export default {
    components: {
      Calendario,
      ModificarPerfil,
      UsuariosRegistrados,
      SolicitudesRegistro,
    },
    data() {
      return {
        vistaActual: 'Calendario',
      };
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
  