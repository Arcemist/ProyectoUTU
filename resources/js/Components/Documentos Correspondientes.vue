<template>
    <v-container>
      <v-card class="mb-4" outlined>
        <v-card-title>Documentos Correspondientes</v-card-title>
        <v-list>
          <v-list-item
            v-for="(documento, index) in documentos"
            :key="index"
            class="border rounded my-2"
          >
            <v-list-item-content>
              <v-list-item-title>{{ documento.nombre }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <v-card-actions>
          <v-btn color="primary" @click="subirDocumento">Subir Documento</v-btn>
        </v-card-actions>
      </v-card>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const documentos = ref([
    { nombre: 'Certificado.pdf' },
    { nombre: 'Documentos Correspondientes.pdf' },
    { nombre: 'Documentos Correspondientes.pdf' }
  ]);
  
  function subirDocumento() {
    // Lógica para subir documentos
  }
  </script>
  