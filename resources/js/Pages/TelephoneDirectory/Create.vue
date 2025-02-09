<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";


const form = useForm({
    photo: null,
    first_name: '',
    middle_name: '',
    last_name: '',
    email: '',
    mobile: '',
    landline: '',
    notes: '',
});

const submit = () => {
    const formData = new FormData();
    formData.append('photo', form.photo);
    formData.append('first_name', form.first_name);
    formData.append('middle_name', form.middle_name);
    formData.append('last_name', form.last_name);
    formData.append('email', form.email);
    formData.append('mobile', form.mobile);
    formData.append('landline', form.landline);
    formData.append('notes', form.notes);

    form.post(route('TelephoneDirectory.store'), {
        preserveScroll: true,
        forceFormData: true, // Ensures proper file handling
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Create Contact" />

        <div class="max-w-4xl mx-auto p-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Create New Contact</h1>
                <Link :href="route('dashboard')" class="text-gray-600 hover:text-gray-800">Back</Link>
            </div>

            <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Photo</label>
                        <input
                            type="file"
                            @input="form.photo = $event.target.files[0]"
                            class="mt-1 block w-full border rounded-lg"
                        />
                        <p class="text-sm text-gray-500 mt-1">Optional, max 500KB</p>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input
                                v-model="form.first_name"
                                type="text"
                                required
                                class="mt-1 block w-full border rounded-lg"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input
                                v-model="form.middle_name"
                                type="text"
                                class="mt-1 block w-full border rounded-lg"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input
                                v-model="form.last_name"
                                type="text"
                                required
                                class="mt-1 block w-full border rounded-lg"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-4 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full border rounded-lg"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input
                            v-model="form.mobile"
                            type="tel"
                            class="mt-1 block w-full border rounded-lg"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Landline Number</label>
                        <input
                            v-model="form.landline"
                            type="tel"
                            class="mt-1 block w-full border rounded-lg"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea
                            v-model="form.notes"
                            class="mt-1 block w-full border rounded-lg"
                        ></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                        :disabled="form.processing"
                    >
                        Save Contact
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<style scoped>

</style>
