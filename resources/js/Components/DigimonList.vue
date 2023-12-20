<script setup lang="ts">
import DigimonListItem from '@/Components/DigimonListItem.vue';
import { Digimon } from '@/types/index'

defineProps<{
    digimons: Digimon[],
}>();
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 2xl:grid-cols-5 gap-4">
       
            <DigimonListItem v-for="digimon in digimons" :digimon="digimon" />
       
    </div>
</template>