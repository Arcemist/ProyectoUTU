<template>
  <AuthenticatedLayout>
    <div class="grid grid-cols-2 gap-4">
      <!-- Calendario -->
      <div style="width: 50%;" class="w-full h-auto">
        <VDatePicker
          v-model="date"
          :masks="masks"
          is-required
          expanded
          @click="mostrarFormulario = true"
        />
      </div>


      <!-- Formulario de Evento -->
      <div v-if="mostrarFormulario" class="w-full h-auto p-4 border-l border-gray-300">
        <h2 class="text-lg font-semibold mb-4">Formulario de Evento</h2>
        
        <div class="mb-4">
          <label for="titulo" class="block font-medium">Título</label>
          <input
            type="text"
            id="titulo"
            v-model="tituloEvento"
            class="w-full border rounded px-2 py-1"
            placeholder="Escriba el título del evento"
          />
        </div>
        
        <div class="mb-4">
          <label for="descripcion" class="block font-medium">Descripción</label>
          <textarea
            id="descripcion"
            v-model="descripcionEvento"
            class="w-full border rounded px-2 py-1"
            rows="4"
            placeholder="Escriba la descripción del evento"
          ></textarea>
        </div>
        
        <div class="mb-4">
          <label for="hora" class="block font-medium">Hora</label>
          <input
            type="time"
            id="hora"
            v-model="horaEvento"
            class="w-full border rounded px-2 py-1"
          />
        </div>

        <button @click="guardarEvento" class="bg-blue-500 text-white px-4 py-2 rounded">
          {{ editando ? 'Actualizar Evento' : 'Guardar Evento' }}
        </button>
      </div>

      <!-- Lista de eventos agendados -->
      <div class="col-span-2 mt-6">
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
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


// Variables para manejar el calendario y los eventos
const date = ref(new Date());
const masks = ref({
  modelValue: 'DD/MM/YYYY',
});

// Muestra el formulario de evento cuando se selecciona una fecha
const mostrarFormulario = ref(false);
const tituloEvento = ref('');
const descripcionEvento = ref('');
const horaEvento = ref('');
const eventos = ref([]); // Lista para almacenar los eventos agendados
const editando = ref(false); // Para saber si estamos editando un evento
let indexEditar = ref(null); // Índice del evento que se está editando

// Función para guardar o actualizar el evento
function guardarEvento() {
  const nuevoEvento = {
    fecha: date.value.toLocaleDateString(), // Usamos la fecha seleccionada
    titulo: tituloEvento.value,
    descripcion: descripcionEvento.value,
    hora: horaEvento.value
  };

  if (editando.value) {
    // Si estamos editando, actualizamos el evento
    eventos.value[indexEditar.value] = nuevoEvento;
    editando.value = false;
  } else {
    // Si no estamos editando, lo agregamos a la lista de eventos
    eventos.value.push(nuevoEvento);
  }

  // Resetear los campos del formulario
  tituloEvento.value = '';
  descripcionEvento.value = '';
  horaEvento.value = '';
  mostrarFormulario.value = false;
}

// Función para editar un evento
function editarEvento(index) {
  // Llenamos el formulario con los datos del evento seleccionado
  const evento = eventos.value[index];
  tituloEvento.value = evento.titulo;
  descripcionEvento.value = evento.descripcion;
  horaEvento.value = evento.hora;
  indexEditar.value = index;
  editando.value = true;
  mostrarFormulario.value = true;
}

// Función para eliminar un evento
function eliminarEvento(index) {
  eventos.value.splice(index, 1); // Eliminar el evento de la lista
}
</script>

<style scoped>
/* Estilos personalizados */
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
