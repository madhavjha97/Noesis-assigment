<script setup>
import { defineProps } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from "chart.js";
import { Bar } from "vue-chartjs";

// Register Chart.js components
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

// Props received from Laravel
const props = defineProps({
    totalContacts: Number,
    totalUsers: Number,
    totalViews: Number,
    last7DaysViews: Array,
    labels: Array,
});

// Chart Data
const chartData = {
    labels: props.labels,
    datasets: [
        {
            label: "Views per Day",
            backgroundColor: "#4F46E5",
            data: props.last7DaysViews,
        },
    ],
};

// Chart Options
const chartOptions = {
    responsive: true,
    plugins: {
        legend: {display: false},
    },
};
</script>

<template>
    <AdminLayout>
        <div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

            <!-- Statistics -->
            <div class="grid grid-cols-3 gap-4 text-white">
                <div class="bg-blue-500 p-4 rounded-lg text-center">
                    <h3 class="text-2xl font-bold">{{ totalContacts }}</h3>
                    <p>All Contacts</p>
                </div>
                <div class="bg-green-500 p-4 rounded-lg text-center">
                    <h3 class="text-2xl font-bold">{{ totalUsers }}</h3>
                    <p>All Users</p>
                </div>
                <div class="bg-red-500 p-4 rounded-lg text-center">
                    <h3 class="text-2xl font-bold">{{ totalViews }}</h3>
                    <p>All Contact Views</p>
                </div>
            </div>

            <!-- Graph -->
            <div class="mt-8 bg-gray-100 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-4">Views per Day (Last 7 Days)</h2>
                <Bar :data="chartData" :options="chartOptions"/>
            </div>
        </div>
    </AdminLayout>
</template>
