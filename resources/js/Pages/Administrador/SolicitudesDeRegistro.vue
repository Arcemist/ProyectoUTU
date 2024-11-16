<script setup>
    import { ref } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';

    const props = defineProps({
        solicitudes: Array
    });

    // Función para aceptar una solicitud
    function aceptarSolicitud(id, index) {
      if (confirm('¿Estás seguro de que deseas aceptar esta solicitud?')) {
        axios.post('/administrador/aceptar_solicitud_de_registro', {
            id: id
        }).then(
            props.solicitudes.splice(index, 1)
        ).catch(
            //alert('Hubo un error')
        );
      }
    }

    // Función para rechazar una solicitud
    function rechazarSolicitud(id, index) {
      if (confirm('¿Estás seguro de que deseas rechazar esta solicitud?')) {
        axios.delete('/administrador/rechazar_solicitud_de_registro', {
            data: {id: id}
        }).then(
            props.solicitudes.splice(index, 1)
        ).catch(
            //alert('Hubo un error')
        );
      }
    }
</script>

<template>
    <Head title="Solicitudes De Registro" />

<AdministratorLayout>
    <div class="flex flex-col w-full h-auto">
        <!-- Lista de Solicitudes de Registro -->
        <div class="w-full">
                <div v-if="solicitudes.length === 0" class="text-center py-3">
                    <p>
                        No hay solicitudes de registro
                    </p>
                </div>

                <!-- Tabla de solicitudes -->
                <div v-else class="overflow-x-auto">
                <table class="min-w-full border rounded bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left border-b">
                                #
                            </th>
                            <th class="px-6 py-3 text-left border-b">
                                Nombre
                            </th>
                            <th class="px-6 py-3 text-left border-b">
                                Correo
                            </th>
                            <th class="px-6 py-3 text-left border-b">
                                Fecha de Solicitud
                            </th>
                            <th class="px-6 py-3 text-left border-b">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(solicitud, index) in solicitudes" class="border-b">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ solicitud.name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ solicitud.email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ solicitud.created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <button @click="aceptarSolicitud(solicitud.id, index)" class="bg-green-500 text-white px-4 py-2 rounded mr-2">
                                    Aceptar
                                </button>
                                <button @click="rechazarSolicitud(solicitud.id, index)" class="bg-red-500 text-white px-4 py-2 rounded">
                                    Rechazar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</AdministratorLayout>
</template>

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
