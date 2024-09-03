<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    sucursales: Object,
    administradores: Object,
    guardias: Object,
    trabaja_en: Object,
    empresas_terciarizadas: Object,
    documentos_de_las_empresas: Object,
    trabajadores_terciarizados: Object,
    documentos_de_los_trabajadores: Object,
    arreglos: Object,
    solicitudes_de_arreglo: Object
});

</script>

<template>
    <Head title="intento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Intento</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <h2 color="blue"> Sucursales: </h2>

                        <div class="p-3 text-gray-900" v-for="sucursal in sucursales">
                            <p> {{ sucursal.Nombre }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Administradores: </h2>

                        <div class="p-3 text-gray-900" v-for="administrador in administradores">
                            <p> {{ administrador.Nombre }} </p>
                            <p> {{ administrador.Cedula }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Guardias: </h2>

                        <div class="p-3 text-gray-900" v-for="guardia in guardias">
                            <p> {{ guardia.Nombre }} </p>
                            <p> {{ guardia.Cedula }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Trabaja_en: </h2>

                        <div class="p-3 text-gray-900" v-for="relacion_trabajo in trabaja_en">
                            <p> {{ relacion_trabajo.Cedula_guardia }} </p>
                            <p> {{ relacion_trabajo.Nombre_sucursal }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Empresas Terciarizadas: </h2>

                        <div class="p-3 text-gray-900" v-for="empresa_terciarizada in empresas_terciarizadas">
                            <p> {{ empresa_terciarizada.Nombre }} </p>
                            <p> {{ empresa_terciarizada.RUT }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Documentos de las Empresas: </h2>

                        <div class="p-3 text-gray-900" v-for="documento in documentos_de_las_empresas">
                            <p> {{ documento.id }} </p>
                            <p> {{ documento.Pertenece_a }} </p>
                            <p> {{ documento.Archivo }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Trabajadores Terciarizados: </h2>

                        <div class="p-3 text-gray-900" v-for="trabajador in trabajadores_terciarizados">
                            <p> {{ trabajador.Cedula }} </p>
                            <p> {{ trabajador.Nombre }} </p>
                            <p> {{ trabajador.Trabaja_en }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Documentos De Los Trabajadores: </h2>

                        <div class="p-3 text-gray-900" v-for="documento in documentos_de_los_trabajadores">
                            <p> {{ documento.id }} </p>
                            <p> {{ documento.Pertenece_a }} </p>
                            <p> {{ documento.Archivo }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Arreglos: </h2>

                        <div class="p-3 text-gray-900" v-for="arreglo in arreglos">
                            <p> {{ arreglo.id }} </p>
                            <p> {{ arreglo.Nombre }} </p>
                            <p> {{ arreglo.Descripcion }} </p>
                            <p> {{ arreglo.Creado_por }} </p>
                            <p> {{ arreglo.Sucursal }} </p>
                            <p> {{ arreglo.Fecha_creacion }} </p>
                            <p> {{ arreglo.Fecha_realizado }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 color="blue"> Solicitudes De Arreglo: </h2>

                        <div class="p-3 text-gray-900" v-for="solicitud in solicitudes_de_arreglo">
                            <p> {{ solicitud.id }} </p>
                            <p> {{ solicitud.Creada_por }} </p>
                            <p> {{ solicitud.Solicita_arreglar }} </p>
                            <p> {{ solicitud.Estado }} </p>
                            <p> {{ solicitud.Personal_asignado }} </p>
                            <p> {{ solicitud.Aprobada_por }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
