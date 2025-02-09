<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Login from "@/Pages/Auth/Login.vue";

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
    <div class="h-screen bg-gray-100 dark:bg-gray-900 overflow-hidden">
        <!-- Header -->
        <header class="flex justify-between items-center p-4 bg-white dark:bg-gray-800 shadow-md">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Noesis</h1>
            <nav v-if="canLogin" class="flex space-x-4">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="route('login')" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600">
                        Log in
                    </Link>
                    <Link v-if="canRegister" :href="route('register')" class="px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-800">
                        Register
                    </Link>
                </template>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center h-full px-4 gap-4">
            <!-- Left Side: Vue.js Login Component -->
            <div class="md:text-left p-6 flex justify-center">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg w-full max-w-md">
                    <Login />
                </div>
            </div>

            <!-- Right Side: Heading and Subheading -->
            <div class="text-center md:text-left p-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome to Your Noesis</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Telephone Directory Application </p>
            </div>
        </div>
    </div>
</template>

