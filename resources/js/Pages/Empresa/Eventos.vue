<script setup>
    import { ref } from 'vue';
    import EnterpriseLayout from '@/Layouts/EnterpriseLayout.vue';

    // Lista de citas agendadas
    const citas = ref([
      { hora: '19:00', fecha: '9/7/2024' },
      { hora: '12:30', fecha: '2/5/2024' },
      { hora: '09:45', fecha: '16/9/2024' },
      { hora: '15:15', fecha: '14/12/2024' }
    ]);

    // Lista de documentos cargados
    const documentos = ref([]);
    const documentoPreview = ref(null);

    // Función para subir documentos
    function subirDocumento(event) {
      const archivo = event.target.files[0];
      if (archivo) {
        const url = URL.createObjectURL(archivo);
        documentos.value.push({ nombre: archivo.name, url });
      }
    }

    // Función para eliminar documentos
    function eliminarDocumento(index) {
      documentos.value.splice(index, 1);
    }

    // Función para ver documento
    function verDocumento(documento) {
      documentoPreview.value = documento;
    }

    // Función para cerrar vista previa
    function cerrarPreview() {
      documentoPreview.value = null;
    }
</script>

<template>
  <EnterpriseLayout>
    <div class="p-4">
      <!-- Citas Agendadas -->
      <div class="mb-6">
        <h2 class="text-lg font-semibold mb-4">Citas Agendadas</h2>
        <div v-if="citas.length === 0" class="bg-gray-200 p-4 rounded">
          <p>No hay citas agendadas.</p>
        </div>
        <div v-else>
          <div
            v-for="(cita, index) in citas"
            :key="index"
            class="border mb-4 p-4 rounded"
          >
            <p><strong>Evento Agendado</strong></p>
            <p>{{ cita.hora }} {{ cita.fecha }}</p>
          </div>
        </div>
      </div>

      <!-- Documentos Correspondientes -->
      <div class="mb-6">
        <h2 class="text-lg font-semibold mb-4">Documentos Correspondientes</h2>
        <div v-if="documentos.length === 0" class="bg-gray-200 p-4 rounded">
          <p>No hay documentos cargados.</p>
        </div>
        <div v-else>
          <div
            v-for="(documento, index) in documentos"
            :key="index"
            class="border mb-4 p-4 rounded flex justify-between items-center"
          >
            <p>{{ documento.nombre }}</p>
            <div>
              <button
                @click="verDocumento(documento)"
                class="bg-green-500 text-white px-2 py-1 rounded mr-2">
                Ver Documento
              </button>
              <button
                @click="eliminarDocumento(index)"
                class="bg-red-500 text-white px-2 py-1 rounded">
                Eliminar
              </button>
            </div>
          </div>
        </div>
        <!-- Botón de subir documentos -->
        <div class="mt-4">
          <label for="file-upload" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            Subir Documento
          </label>
          <input
            id="file-upload"
            type="file"
            @change="subirDocumento"
            class="hidden"
          />
        </div>
      </div>

      <!-- Modal para ver documento -->
      <div v-if="documentoPreview" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded">
          <h3 class="text-lg font-semibold mb-2">Vista Previa: {{ documentoPreview.nombre }}</h3>
          <iframe
            :src="documentoPreview.url"
            class="w-[600px] h-[600px]"
            frameborder="0"></iframe>
          <div class="mt-4 flex justify-end">
            <button
              @click="cerrarPreview"
              class="bg-red-500 text-white px-4 py-2 rounded">
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </EnterpriseLayout>
</template>

<style scoped>
    /* Estilos personalizados para las tablas y botones */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 10px;
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
</style>
