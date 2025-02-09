
<script>

import $ from 'jquery';
import 'datatables.net'
import 'datatables.net-dt/css/dataTables.dataTables.min.css'
import AdminLayout from "@/Layouts/AdminLayout.vue";

import { Link } from "@inertiajs/vue3";

export default {
    components: {AdminLayout, Link },
    props: {
        telephones: Array, // Receiving data from the Laravel controller
    },
    mounted() {
        this.$nextTick(() => {
            $("#telephoneTable").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
               // order: [[0, "desc"]], // Sort by the first column (ID) in descending order

            });
        });
    },
};
</script>

<template>
   <AdminLayout>
       <div class="card">
           <div class="card-header">
               <h3 class="card-title">Telephone Directory</h3>
           </div>
           <div class="card-body">
               <table id="telephoneTable" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                       <th>Sr.No</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Mobile Number</th>

                       <th>Action</th>

                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="(contact, index) in telephones" :key="contact.id">
                       <td class="border p-2">{{ index + 1 }}</td> <!-- Sr. No -->
                       <td class="border p-2">{{ contact.first_name }}</td>
                       <td class="border p-2">{{ contact.last_name }}</td>
                       <td class="border p-2">{{ contact.email || "N/A" }}</td>
                       <td class="border p-2">{{ contact.mobile_number || "N/A" }}</td>

                       <td class="border p-2">
                           <Link :href="route('TelephoneDirectory.show', contact.id)" class="text-blue-500 hover:text-blue-700">
                               View
                           </Link>

                           <Link :href="route('TelephoneDirectory.edit', contact.id)" class="text-green-500 hover:text-green-700 ml-2">
                               Edit
                           </Link>
                       </td>

                   </tr>
                   </tbody>
               </table>
           </div>
       </div>
   </AdminLayout>
</template>
