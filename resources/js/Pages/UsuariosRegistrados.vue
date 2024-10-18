<template>
  <AuthenticatedLayout>
    <div class="p-4">
      <!-- Barra de búsqueda -->
      <div class="flex items-center mb-6">
        <input
          v-model="search"
          type="text"
          placeholder="Buscar Usuario"
          class="border rounded px-4 py-2 w-full mr-4"
        />
        <button @click="buscarUsuario" class="bg-blue-500 text-white px-4 py-2 rounded">
          Buscar
        </button>
      </div>

      <!-- Lista de usuarios registrados -->
      <div class="grid grid-cols-1 gap-4">
        <div v-for="(usuario, index) in usuariosFiltrados" :key="index" class="flex items-center border rounded p-4 bg-white shadow">
          <!-- Foto de perfil -->
          <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 flex justify-center items-center">
            <img
              :src="usuario.fotoPerfil"
              alt="Foto de Perfil"
              class="rounded-full w-full h-full object-cover"
            />
          </div>

          <!-- Nombre del usuario -->
          <div class="flex-grow">
            <p class="text-lg font-semibold">{{ usuario.nombre }}</p>
          </div>

          <!-- Botón "Ver Perfil" -->
          <div class="mr-4">
            <button @click="verPerfil(usuario)" class="bg-blue-500 text-white px-4 py-2 rounded">
              Ver Perfil
            </button>
          </div>

          <!-- Botón "Eliminar Usuario" -->
          <div>
            <button @click="eliminarUsuario(index)" class="bg-red-500 text-white px-4 py-2 rounded">
              Eliminar
            </button>
          </div>
        </div>
      </div>

      <!-- Modal para ver el perfil del usuario -->
      <div v-if="perfilSeleccionado" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded shadow-lg w-1/2">
          <!-- Header del modal -->
          <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold mb-4">Perfil de {{ perfilSeleccionado.nombre }}</h2>
          </div>

          <!-- Foto y detalles del usuario -->
          <div class="flex justify-between items-center mb-8">
            <!-- Foto de perfil -->
            <div class="w-24 h-24 rounded-full bg-gray-300 flex justify-center items-center mr-4">
              <img
                :src="perfilSeleccionado.fotoPerfil"
                alt="Foto de Perfil"
                class="rounded-full w-full h-full object-cover"
              />
            </div>

            <!-- Información del usuario -->
            <div class="flex-grow pl-6">
              <p class="text-lg"><strong>Nombre:</strong> {{ perfilSeleccionado.nombre }}</p>
              <p class="text-lg mt-4"><strong>Email:</strong> {{ perfilSeleccionado.email }}</p>
              <p class="text-lg mt-4"><strong>Teléfono:</strong> {{ perfilSeleccionado.telefono }}</p>
            </div>
          </div>

          <!-- Sección de Documentos Publicados -->
          <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Documentos Publicados</h3>
            <ul class="space-y-4">
              <li v-for="(documento, docIndex) in perfilSeleccionado.documentos" :key="docIndex" class="flex justify-between items-center border rounded p-4 bg-gray-100">
                <span>{{ documento.nombre }}</span>
                <a
                  :href="documento.enlace"
                  target="_blank"
                  class="text-blue-500 underline"
                >
                  Ver/Descargar
                </a>
              </li>
            </ul>
          </div>

          <!-- Footer con botón de cerrar -->
          <div class="text-center">
            <button @click="cerrarPerfil" class="bg-blue-500 text-white px-6 py-3 rounded">
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Datos de usuarios registrados (simulados)
const usuarios = ref([
  { nombre: 'Usuario 1', email: 'usuario1@example.com', telefono: '123456789', fotoPerfil: 'https://via.placeholder.com/50', documentos: [
    { nombre: 'Documento 1', enlace: 'https://via.placeholder.com/150' },
    { nombre: 'Documento 2', enlace: 'https://via.placeholder.com/150' }
  ]},
  { nombre: 'Usuario 2', email: 'usuario2@example.com', telefono: '987654321', fotoPerfil: 'https://via.placeholder.com/50', documentos: [
    { nombre: 'Documento 3', enlace: 'https://via.placeholder.com/150' },
  ]},
  { nombre: 'Usuario 3', email: 'usuario3@example.com', telefono: '1122334455', fotoPerfil: 'https://via.placeholder.com/50', documentos: [
    { nombre: 'Documento 4', enlace: 'https://via.placeholder.com/150' },
    { nombre: 'Documento 5', enlace: 'https://via.placeholder.com/150' }
  ]},
  { nombre: 'Usuario 4', email: 'usuario4@example.com', telefono: '5566778899', fotoPerfil: 'https://via.placeholder.com/50', documentos: []},
]);

// Variables para búsqueda y perfil seleccionado
const search = ref('');
const perfilSeleccionado = ref(null);

// Filtrar usuarios según la búsqueda
const usuariosFiltrados = computed(() => {
  if (!search.value) {
    return usuarios.value;
  }
  return usuarios.value.filter((usuario) =>
    usuario.nombre.toLowerCase().includes(search.value.toLowerCase())
  );
});

// Función para buscar usuario
function buscarUsuario() {
  console.log('Buscar:', search.value);
}

// Función para ver el perfil del usuario
function verPerfil(usuario) {
  perfilSeleccionado.value = usuario;
}

// Función para cerrar el modal de perfil
function cerrarPerfil() {
  perfilSeleccionado.value = null;
}

// Función para eliminar un usuario
function eliminarUsuario(index) {
  if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
    usuarios.value.splice(index, 1);
  }
}
</script>

<style scoped>
/* Estilos personalizados */
button {
  transition: background-color 0.2s;
}
button:hover {
  background-color: #3b82f6;
}
.bg-red-500:hover {
  background-color: #e53e3e;
}
</style>
