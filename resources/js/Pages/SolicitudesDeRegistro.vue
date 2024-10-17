<template>
  <AuthenticatedLayout>
    <div class="flex flex-col w-full h-auto">
      <!-- Lista de Solicitudes de Registro -->
      <div class="w-full">
        <h2 class="text-lg font-semibold mb-4">Solicitudes de Registro</h2>
        
        <div v-if="solicitudes.length === 0" class="text-center">
          <p>No hay solicitudes de registro.</p>
        </div>
        <!-- Tabla de solicitudes -->
        <div v-else class="overflow-x-auto">
          <table class="min-w-full border rounded bg-gray-800 text-white">
            <thead>
              <tr>
                <th class="px-6 py-3 text-left border-b">#</th>
                <th class="px-6 py-3 text-left border-b">Foto de Perfil</th>
                <th class="px-6 py-3 text-left border-b">Nombre</th>
                <th class="px-6 py-3 text-left border-b">Correo</th>
                <th class="px-6 py-3 text-left border-b">Fecha de Solicitud</th>
                <th class="px-6 py-3 text-left border-b">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(solicitud, index) in solicitudes" :key="index" class="bg-gray-700 border-b">
                <td class="px-6 py-4">{{ index + 1 }}</td>
                <td class="px-6 py-4">
                  <img :src="solicitud.fotoPerfil" alt="Foto de perfil" class="w-12 h-12 rounded-full object-cover" />
                </td>
                <td class="px-6 py-4">{{ solicitud.nombre }}</td>
                <td class="px-6 py-4">{{ solicitud.correo }}</td>
                <td class="px-6 py-4">{{ solicitud.fecha }}</td>
                <td class="px-6 py-4">
                  <button @click="aceptarSolicitud(index)" class="bg-green-500 text-white px-4 py-2 rounded mr-2">Aceptar</button>
                  <button @click="rechazarSolicitud(index)" class="bg-red-500 text-white px-4 py-2 rounded">Rechazar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Lista de solicitudes de registro con fotos de perfil
const solicitudes = ref([
  { nombre: 'Juan Pérez', correo: 'juan@example.com', fecha: '12/10/2024', fotoPerfil: 'https://randomuser.me/api/portraits/men/1.jpg' },
  { nombre: 'Ana López', correo: 'ana@example.com', fecha: '13/10/2024', fotoPerfil: 'https://randomuser.me/api/portraits/women/2.jpg' }
]);

// Función para aceptar una solicitud
function aceptarSolicitud(index) {
  solicitudes.value.splice(index, 1); // Elimina la solicitud aceptada
  alert('Solicitud aceptada');
}

// Función para rechazar una solicitud
function rechazarSolicitud(index) {
  solicitudes.value.splice(index, 1); // Elimina la solicitud rechazada
  alert('Solicitud rechazada');
}
</script>

<style scoped>
/* Estilos personalizados para la tabla */
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 15px;
  text-align: left;
}
th {
  background-color: #ffffff;
  color: black;
}
td {
  background-color: #ffffff;
  color: black;
}

img {
  border-radius: 50%; /* Para hacer que las imágenes sean circulares */
}
</style>
