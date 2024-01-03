<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useRouter } from 'vue-router';

defineProps({
    users: Array, // Data pengguna yang akan ditampilkan
});

const navigateToEditPage = (userId) => {
    router.push({ name: 'user.edit', params: { id: userId } });
};
</script>

<template>
    <AppLayout title="User List">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User List
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 text-gray-800 dark:text-gray-200">
                <!-- Tabel untuk menampilkan daftar pengguna -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Tindakan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Iterasi melalui data pengguna untuk menampilkan setiap baris -->
                        <tr v-for="user in users" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.role }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.alamat }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ user.status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button @click="() => navigateToEditPage(user.id)" class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
