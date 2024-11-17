<script setup>
    import { ref, computed } from 'vue';
    import { Link, Head } from '@inertiajs/vue3';
    import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
    import axios from 'axios';

    const props = defineProps({
        usuarios: Array
    });

    // Variables para búsqueda y perfil seleccionado
    const search = ref('');
    const perfilSeleccionado = ref(null);

    // Filtrar usuarios según la búsqueda
    const usuariosFiltrados = computed(() => {
      if (!search.value) {
        return props.usuarios;
      }
      return props.usuarios.filter((usuario) =>
        usuario.name.toLowerCase().includes(search.value.toLowerCase())
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
    function eliminarUsuario(id, index) {
      if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        axios.delete('/administrador/eliminar_usuario', {
            data: {id: id}
        }).then(
            props.usuarios.splice(index, 1)
        ).catch(
            //console.log('error')
        );
      }
    }


</script>

<template>
    <Head title="Usuarios Registrados" />

  <AdministratorLayout>
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
        <div v-for="(usuario, index) in usuariosFiltrados" class="flex items-center border rounded p-4 bg-white shadow">

          <!-- Nombre del usuario -->
          <div class="flex-grow">
            <p class="text-lg font-semibold">{{ usuario.name }}</p>
          </div>

          <!-- Botón "Ver Perfil" -->
          <div class="mr-4">
            <button @click="verPerfil(usuario)" class="bg-blue-500 text-white px-4 py-2 rounded">
              Ver Perfil
            </button>
          </div>

          <!-- Botón "Eliminar Usuario" -->
          <div>
            <button @click="eliminarUsuario(usuario.id, index)" class="bg-red-500 text-white px-4 py-2 rounded">
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
            <h2 class="text-2xl font-bold mb-4">Perfil de {{ perfilSeleccionado.name }}</h2>
          </div>

          <!-- Foto y detalles del usuario -->
          <div class="flex justify-between items-center mb-8">

            <!-- Información del usuario -->
            <div class="flex-grow pl-6">
              <p class="text-lg"><strong>Nombre:</strong> {{ perfilSeleccionado.name }}</p>
              <p class="text-lg"><strong>Email:</strong> {{ perfilSeleccionado.email }}</p>
              <p class="text-lg"><strong>ID:</strong> {{ perfilSeleccionado.id }}</p>
              <p class="text-lg"><strong>Tipo:</strong> {{ perfilSeleccionado.user_type }}</p>
            </div>
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
  </AdministratorLayout>
</template>

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
