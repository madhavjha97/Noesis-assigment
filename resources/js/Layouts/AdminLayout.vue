<script setup>

import Header from "@/Layouts/Header.vue";
import Sidebar from "@/Layouts/Sidebar.vue";
import Footer from "@/Layouts/Footer.vue";

</script>

<template>
   <Header></Header>
    <Sidebar></Sidebar>

    <div class="content-wrapper">
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white p-2 rounded mb-4">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white p-2 rounded mb-4">
            {{ $page.props.flash.error }}
        </div>

<slot></slot>


<Footer></Footer>
    </div>
</template>

<style scoped>

</style>
