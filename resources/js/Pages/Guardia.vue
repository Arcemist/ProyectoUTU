
<script setup>
  import { ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


  // Variables para manejar el calendario y los eventos
  const masks = ref({
    modelValue: 'DD/MM/YYYY',
  });

  defineProps({
    EventosCalendario: Object,
    InfoEventos: Object
  });

  // Muestra el formulario de evento cuando se selecciona una fecha
  const tituloEvento = ref('');
  const descripcionEvento = ref('');
  const horaEvento = ref('');
  const eventos = ref([]); // Lista para almacenar los eventos agendado
  </script>

  <style scoped>
    .right-align {
        text-align: right;
    }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    padding: 10px;
    text-align: left;
  }
  th {
    background-color: #ffffff;
    color: black;
  }
  td {
    background-color: #ffffff;
    color:black;
  }
  </style>

<template>
    <AuthenticatedLayout>
      <div class="grid grid-cols-2 gap-4">
        <!-- Calendario -->
        <div style="width: 50%;" class="w-full h-auto">
          <VDatePicker
            v-model="date"
            :masks="masks"
            :attributes="EventosCalendario"

            is-required
            expanded
          />
        </div>
        <!-- Lista de eventos agendados -->
        <div class="center">
          <h3 class="text-lg font-semibold mb-2">Eventos Agendados</h3>
          <div v-if="eventos.length === 0">
            <p>No hay eventos agendados aún.</p>
          </div>
          <!-- Tabla de eventos agendados -->
          <div v-else class="overflow-x-auto">
            <table class="min-w-full border rounded bg-gray-800 text-white">
              <thead>
                <tr>
                  <th class="px-4 py-2 text-left border-b">#</th>
                  <th class="px-4 py-2 text-left border-b">Título</th>
                  <th class="px-4 py-2 text-left border-b">Fecha</th>
                  <th class="px-4 py-2 text-left border-b">Descripción</th>
                  <th class="px-4 py-2 text-left border-b">Hora</th>
                  <th class="px-4 py-2 text-left border-b">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(evento, index) in eventos" :key="index" class="bg-gray-700 border-b">
                  <td class="px-4 py-2">{{ index + 1 }}</td>
                  <td class="px-4 py-2">{{ evento.titulo }}</td>
                  <td class="px-4 py-2">{{ evento.fecha }}</td>
                  <td class="px-4 py-2">{{ evento.descripcion }}</td>
                  <td class="px-4 py-2">{{ evento.hora }}</td>
                  <td class="px-4 py-2">
                    <button @click="editarEvento(index)" class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Editar</button>
                    <button @click="eliminarEvento(index)" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div v-for="infoevento in InfoEventos">
            {{ infoevento.descripcion }}
        </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
