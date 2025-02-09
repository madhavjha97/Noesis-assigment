<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <Link :href="route('profile.edit')" class="nav-link">
                    Profile
                </Link>

            </li>


            <li class="nav-item d-none d-sm-inline-block">
                <Link  :href="route('logout')"
                       method="post"
                class="nav-link">
                    Logout
                </Link>

            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->
</template>

<style scoped>

</style>
