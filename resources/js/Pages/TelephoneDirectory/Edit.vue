<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    contact: Object,
});

const form = useForm({
    first_name: props.contact.first_name,
    middle_name: props.contact.middle_name || "",
    last_name: props.contact.last_name,
    email: props.contact.email || "",
    mobile_number: props.contact.mobile_number || "",
    photo: null,
});

const handleFileUpload = (event) => {
    form.photo = event.target.files[0];
};

const submitForm = () => {
    form.post(route("TelephoneDirectory.update", props.contact.id), {
        method: "put",
    });
};
</script>

<template>
    <AdminLayout>
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Edit Contact</h1>

            <form @submit.prevent="submitForm">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">First Name</label>
                        <input
                            type="text"
                            v-model="form.first_name"
                            class="w-full border rounded px-3 py-2"
                            required
                        />
                    </div>
                    <div>
                        <label class="block font-medium">Middle Name</label>
                        <input
                            type="text"
                            v-model="form.middle_name"
                            class="w-full border rounded px-3 py-2"
                        />
                    </div>
                    <div>
                        <label class="block font-medium">Last Name</label>
                        <input
                            type="text"
                            v-model="form.last_name"
                            class="w-full border rounded px-3 py-2"
                            required
                        />
                    </div>
                    <div>
                        <label class="block font-medium">Email</label>
                        <input
                            type="email"
                            v-model="form.email"
                            class="w-full border rounded px-3 py-2"
                        />
                    </div>
                    <div>
                        <label class="block font-medium">Mobile</label>
                        <input
                            type="text"
                            v-model="form.mobile_number"
                            class="w-full border rounded px-3 py-2"
                        />
                    </div>
                    <div>
                        <label class="block font-medium">Photo</label>
                        <input
                            type="file"
                            @change="handleFileUpload"
                            class="w-full border rounded px-3 py-2"
                        />
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded"
                    >
                        Update
                    </button>
                    <Link
                        :href="route('TelephoneDirectory.index')"
                        class="bg-gray-500 text-white px-4 py-2 rounded"
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
