<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

// Controla el estado de mostrar el dropdown de navegación
const showingNavigationDropdown = ref(false);

// Controla el estado de mostrar el menú de notificaciones
const showingNotificationDropdown = ref(false);

// Lista simulada de solicitudes de registro (para simular notificaciones)
const notifications = ref([
    { id: 1, name: 'John Doe', message: 'Ha solicitado registrarse.' },
    { id: 2, name: 'Jane Smith', message: 'Ha solicitado registrarse.' },
]);

defineProps({
    Paginas: Object
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <!-- Agregar los demás enlaces de navegación aquí -->
                            </div>
                        </div>

                        <!-- Notificaciones -->
                        <div class="flex items-center space-x-4">
                            <!-- Notification Bell Icon -->
                            <div class="relative">
                                <button
                                    @click="showingNotificationDropdown = !showingNotificationDropdown"
                                    class="relative inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                >
                                    <svg
                                        class="h-6 w-6 text-gray-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.157V11a6.003 6.003 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.157c0 .538-.214 1.055-.595 1.438L4 17h5m0 0v1a3 3 0 006 0v-1m-6 0h6"
                                        />
                                    </svg>

                                    <!-- Badge de número de notificaciones -->
                                    <span v-if="notifications.length" class="absolute top-0 right-0 inline-block w-3 h-3 bg-red-600 rounded-full"></span>
                                </button>

                                <!-- Dropdown de Notificaciones -->
                                <div
                                    v-if="showingNotificationDropdown"
                                    class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-md py-2"
                                >
                                    <div v-if="notifications.length > 0">
                                        <div
                                            v-for="notification in notifications"
                                            :key="notification.id"
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            <p class="text-sm font-medium text-gray-700">{{ notification.name }}</p>
                                            <p class="text-sm text-gray-500">{{ notification.message }}</p>
                                        </div>
                                    </div>
                                    <div v-else class="px-4 py-2 text-sm text-gray-500">
                                        No tienes notificaciones nuevas.
                                    </div>
                                </div>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')">
                                            Profile
                                        </DropdownLink>

                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                    <!-- Aquí va el menú de navegación responsive -->
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
