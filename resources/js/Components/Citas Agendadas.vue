<template>
    <v-container>
      <v-card class="mb-4" outlined>
        <v-card-title>Citas Agendadas</v-card-title>
        <v-list>
          <v-list-item
            v-for="(evento, index) in citas"
            :key="index"
            class="border rounded my-2"
          >
            <v-list-item-content>
              <v-list-item-title>{{ evento.titulo }}</v-list-item-title>
              <v-list-item-subtitle>{{ evento.hora }} {{ evento.fecha }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-card>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const citas = ref([
    { titulo: 'Evento Agendado', hora: '19:00', fecha: '9/7/2024' },
    { titulo: 'Evento Agendado', hora: '12:30', fecha: '2/5/2024' },
    { titulo: 'Evento Agendado', hora: '09:45', fecha: '16/9/2024' },
    { titulo: 'Evento Agendado', hora: '15:15', fecha: '14/12/2024' }
  ]);
  </script>
  