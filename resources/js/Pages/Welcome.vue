<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="text-black bg-white">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 grid-cols-3">
                    <div class="flex justify-center col-start-2">
                        <ApplicationLogo/>
                    </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 grid-cols-0 gap-8 justify-center items-center">
                        <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                            <Link
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                class="
                                rounded-md px-3 py-2 text-black ring-1 ring-transparent transition
                                hover:text-black/70
                                focus:outline-none focus-visible:ring-[#FF2D20]
                                bg-blue-300
                                "
                            >
                                Dashboard
                            </Link>

                            <template v-else>
                                <Link
                                    :href="route('login')"
                                    class="
                                    rounded-md mr-5 px-3 py-2 text-black ring-1 ring-transparent transition
                                    hover:text-black/70
                                    focus:outline-none focus-visible:ring-[#FF2D20]
                                    bg-blue-300
                                    "
                                >
                                    Iniciar sesión
                                </Link>

                                <Link
                                    v-if="canRegister"
                                    :href="route('register')"
                                    class="
                                    rounded-md ml-5 px-3 py-2 text-black ring-1 ring-transparent transition
                                    hover:text-black/70
                                    focus:outline-none focus-visible:ring-[#FF2D20]
                                    bg-blue-300
                                    "
                                >
                                    Registrarse
                                </Link>
                            </template>
                        </nav>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
