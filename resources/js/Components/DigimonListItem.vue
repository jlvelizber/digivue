<script setup lang="ts">
import { Digimon } from '@/types/index'
import { Link } from '@inertiajs/vue3';
defineProps<{
    digimon: Digimon,
}>();
</script>

<template>
    <Link :href="route('dashboard')">
    <div class="bg-gray-100 hover:bg-gray-200 p-2">
        <img v-bind:src="digimon.image" class="object-cover" />
        <p class="text-center text-gray-500 hover:text-gray-700"> #{{ digimon.id }}</p>
        <p class="text-center text-blue-500 hover:text-blue-700 font-bold text-sm"> {{ digimon.name }}</p>
    </div>
    </Link>
</template>