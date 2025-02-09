<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/img/noesis_tech_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Noesis</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">


                </div>
                <div class="info">
                    <a href="#" class="d-block"> <i>Welcome</i>    {{ $page.props.auth.user.name }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">

                        <Link :href="route('dashboard')" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard

                            </p>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('TelephoneDirectory.index')" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Telephone Directory</p>
                        </Link>
                    </li>


                    <li class="nav-item">
                        <Link :href="route('TelephoneDirectory.create')" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>Add Telephone Directory</p>
                        </Link>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

</template>

<style scoped>

</style>
