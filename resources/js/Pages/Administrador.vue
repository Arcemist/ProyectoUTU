<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    EventosCalendario: Object
});

const fecha_ejemplo = new Date(2018, 9, 15);

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
                <p> {{ fecha_ejemplo }} </p>
            </div>

            <div class="absolute inset-y-0 left-0 w-3/12 bg-green-600">
                <VDatePicker
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
