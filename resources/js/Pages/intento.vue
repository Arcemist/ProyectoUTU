<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const date = new Date

defineProps({
    sucursales: Object,
    usuarios: Object,
    documentos: Object,
    arreglos: Object,
});

</script>

<template>
    <Head title="intento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Intento</h2>
        </template>

        <div class="pl-[4%] pt-[4%] pr-[4%] w-9/10 text-center">
            <p class="bg-green-200 rounded-lg">
                {{ date }}
            </p>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-blue-100 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <h2 class="text-blue-700"> Sucursales: </h2>

                        <div class="p-3 text-gray-900" v-for="sucursal in sucursales">
                            <p> {{ sucursal.Nombre }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Usuarios: </h2>

                        <div class="p-3 text-gray-900" v-for="usuario in usuarios">
                            <p> {{ usuario.id }} </p>
                            <p> {{ usuario.name }} </p>
                            <p> {{ usuario.email }} </p>
                            <p> {{ usuario.user_type }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Documentos: </h2>

                        <div class="p-3 text-gray-900" v-for="documento in documentos">
                            <p> {{ documento.id }} </p>
                            <p> {{ documento.Pertenece_a }} </p>
                            <p> {{ documento.Archivo }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Arreglos: </h2>

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

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
