<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    EventosCalendario: Object,
    InfoEventos: Object
});

const date = ref(new Date());
const masks = ref({
    modelValue: 'DD/MM/YYYY'
});

</script>

<template>
    <AuthenticatedLayout>
        <template #header>

        </template>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 w-9/12 h-auto bg-blue-600">
                <p> {{ date }} </p>
                <p> {{ EventosCalendario }} </p>
                <p> {{ InfoEventos }} </p>

                <p> {{ EventosCalendario[0].dates }} </p>
                <p> {{ InfoEventos[0].fecha }} </p>

                <p v-for="Evento in EventosCalendario"> {{ Evento.dates }} </p>
                <p v-for="Info in InfoEventos"> {{ Info.fecha }} </p>
            </div>

            <div class="absolute inset-y-0 left-0 w-3/12 bg-green-600">
                <VDatePicker @click="VerDetallesEvento"
                    v-model.string="date"
                    :masks="masks"
                    :attributes="EventosCalendario"
                    expanded
                    is-required
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>

</style>
