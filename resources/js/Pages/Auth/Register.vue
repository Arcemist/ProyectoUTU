<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    user_type: '',
    ci: '',
    direccion: '',
    telefono: '',
    profesion: '',
    tipo: '',

});

const submit = () => {
    form.post(route('register'), {
        preserveScroll: true,
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"></Head>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="user_type" value="Tipo de usuario" class="animate-[pulse_1.7s_ease-in-out_2]"/>

                <select
                    id="user_type"
                    v-model="form.user_type"
                    class="w-full animate-[pulse_1.7s_ease-in-out_2]"
                    label="Porfavor elija un tipo de usuario"
                >
                    <option value="Guardia">
                        Guardia
                    </option>

                    <option value="Empresa">
                        Empresa
                    </option>

                    <option value="Administrador">
                        Administrador
                    </option>
                </select>
            </div>
            <div>
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Contraseña" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirmar Contraseña" />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
                <div v-if="form.user_type === 'Guardia'" class="mt-4">
                    <InputLabel for="ci" value="Cédula de Identidad"/>
                    <TextInput
                        id="ci"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.ci"
                        required
                        autofocus
                        autocomplete="ci"
                    />
                    <InputError class="mt-2" :message="form.errors.ci" />

                    <InputLabel for="direccion" value="Dirección"/>
                    <TextInput
                        id="direccion"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.direccion"
                        required
                        autofocus
                        autocomplete="direccion"
                    />
                    <InputError class="mt-2" :message="form.errors.direccion"/>

                    <InputLabel for="telefono" value="Teléfono"/>
                    <TextInput
                        id="telefono"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.telefono"
                        required
                        autofocus
                        autocomplete="telefono"
                    />
                    <InputError class="mt-2" :message="form.errors.telefono" />

                    <InputLabel for="profesion" value="Cargo"/>
                    <TextInput
                        id="profesion"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.profesion"
                        required
                        autofocus
                        autocomplete="profesion"
                    />
                    <InputError class="mt-2" :message="form.errors.profesion" />

                    <InputLabel for="horario" value="Horario" class="animate-[pulse_1.7s_ease-in-out_2]"/>

                <select
                    id="horario"
                    v-model="form.horario"
                    class="w-full animate-[pulse_1.7s_ease-in-out_2]"
                    label="Por favor elija un horario"
                >
                    <option value="6-14">
                        6:00 - 14:00
                    </option>

                    <option value="14-22">
                        14:00 - 22:00
                    </option>

                    <option value="22-6">
                        22:00 - 6:00
                    </option>

                    <option value="rotativo">
                        Rotativo
                    </option>
                </select>
                </div>

                <div v-if="form.user_type === 'Empresa'" class="mt-4">
                    <InputLabel for="tipo" value="Tipo de Empresa"/>
                    <TextInput
                        id="tipo"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.tipo"
                        required
                        autofocus
                        autocomplete="tipo"
                    />
                    <InputError class="mt-2" :message="form.errors.tipo"/>
                </div>
                <div v-if="form.user_type === 'Administrador'" class="mt-4">
                    <h1>EL CÓDIGO FUNCIONA AHORA CALLATE</h1>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Iniciar Sesión
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Registrar
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
