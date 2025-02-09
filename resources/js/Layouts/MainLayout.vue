<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <Link :href="route('contacts.index')" class="text-lg font-semibold text-gray-900">
                            Contact App
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-6">
            <slot />
        </main>
    </div>
</template>

<style scoped>

</style>
