<script setup>
    import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
    import { Head } from '@inertiajs/vue3';

    const date = new Date

    defineProps({
        sucursales: Object,
        usuarios: Object,
        documentos: Object,
        arreglos: Object,
        arreglosHistorial: Object
    });

</script>

<template>
    <Head title="intento" />

    <AdministratorLayout>
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
                            <p> ID: {{ sucursal.id }} </p>
                            <p> Nombre: {{ sucursal.Nombre }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Usuarios: </h2>

                        <div class="p-3 text-gray-900" v-for="usuario in usuarios">
                            <p> ID: {{ usuario.id }} </p>
                            <p> Nombre: {{ usuario.name }} </p>
                            <p> Email: {{ usuario.email }} </p>
                            <p> Tipo: {{ usuario.user_type }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Documentos: </h2>

                        <div class="p-3 text-gray-900" v-for="documento in documentos">
                            <p>
                                Subido_por: {{ documento.Subido_por }} <br>
                                      Ruta: {{ documento.Ruta }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Arreglos: </h2>

                        <div class="p-3 text-gray-900" v-for="arreglo in arreglos">
                            <p> ID: {{ arreglo.id }} </p>
                            <p> Nombre: {{ arreglo.Nombre }} </p>
                            <p> Descripcion: {{ arreglo.Descripcion }} </p>
                            <p> Creado_por: {{ arreglo.Creado_por }} </p>
                            <p> Empresa_encargada: {{ arreglo.Empresa_encargada }} </p>
                            <p> Personal_encargado: {{ arreglo.Personal_encargado }} </p>
                            <p> Sucursal: {{ arreglo.Sucursal }} </p>
                            <p> Fecha_creacion: {{ arreglo.created_at }} </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-blue-700"> Arreglos Historial: </h2>

                        <div class="p-3 text-gray-900" v-for="arreglo in arreglosHistorial" >
                            <p> ID: {{ arreglo.id }} </p>
                            <p> Nombre: {{ arreglo.Nombre }} </p>
                            <p> Descripcion: {{ arreglo.Descripcion }} </p>
                            <p> Creado_por:
                                <div class="pl-8" v-for="attributo in arreglo.Creado_por">
                                    {{ attributo }}
                                </div>
                            </p>
                            <p> Empresa_encargada:
                                <div class="pl-8" v-for="attributo in arreglo.Empresa_encargada">
                                    {{ attributo }}
                                </div>
                            </p>
                            <p> Personal_encargado: {{ arreglo.Personal_encargado }} </p>
                            <p> Sucursal:
                                <div class="pl-8" v-for="attributo in arreglo.Sucursal">
                                    {{ attributo }}
                                </div>
                            </p>
                            <p> Fecha_creacion: {{ arreglo.created_at }} </p>
                            <p> Fecha_realizado: {{ arreglo.Fecha_realizado }} </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AdministratorLayout>
</template>
