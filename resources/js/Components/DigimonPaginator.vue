<script setup lang="ts">
import { Pagineable } from '@/types';
import { Link } from '@inertiajs/vue3';

defineProps<{
    paginator: Pagineable,
}>();
</script>

<template>
    <div class="flex justify-center mt-8  items-center">
        <nav class="flex space-x-2 mt-2 overflow-x-auto">

            <!-- Page Numbers -->
            <Link class="px-2 py-2 mx-1 bg-blue-500 text-white rounded-md" :href="route('dashboard', {
                index
            })" v-for="(page, index) in paginator.totalPages" :key="index">{{ page }}</Link>
        </nav>
    </div>
</template>