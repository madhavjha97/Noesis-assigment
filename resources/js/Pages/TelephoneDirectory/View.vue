<script>
import { defineProps } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: { AdminLayout, Link },
    props: {
        contact: Object, // Receiving single contact data
        viewCount: Number, // Receiving view count
    },
};
</script>
<template>
    <AdminLayout>
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Contact Details</h1>

            <div class="grid grid-cols-2 gap-4">
                <div v-if="contact.photo">
                    <strong>Photo:</strong>
                    <img :src="'/storage/' + contact.photo" alt="Contact Photo" class="mt-2 rounded-md w-24 h-24">
                </div>
                <div v-else>
                    <strong>Photo:</strong> No Image Available
                </div>

                <div>
                    <strong>First Name:</strong> {{ contact.first_name }}
                </div>
                <div>
                    <strong>Middle Name:</strong> {{ contact.middle_name || "N/A" }}
                </div>
                <div>
                    <strong>Last Name:</strong> {{ contact.last_name }}
                </div>
                <div>
                    <strong>Email:</strong> {{ contact.email || "N/A" }}
                </div>
                <div>
                    <strong>Mobile:</strong> {{ contact.mobile_number || "N/A" }}
                </div>
                <div>
                    <strong>Landline:</strong> {{ contact.landline_number || "N/A" }}
                </div>
                <div>
                    <strong>Notes:</strong> {{ contact.notes || "N/A" }}
                </div>
                <div>
                    <strong>Created At:</strong> {{ new Date(contact.created_at).toLocaleDateString("en-GB") }}
                </div>
                <div class="p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 mt-4">
                    <strong>Number of Views:</strong> <span class="text-xl font-bold">{{ viewCount }}</span>
                </div>

            </div>

            <div class="mt-6">
                <Link :href="route('TelephoneDirectory.index')" class="bg-gray-500 text-white px-4 py-2 rounded">
                    Back
                </Link>
            </div>
        </div>
    </AdminLayout>
</template>
