<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Digimon, } from '@/types/index'
import { Link } from '@inertiajs/vue3';

defineProps<{
    digimon: Digimon
}>();
</script>

<template>
    <Head title="Digimundo" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Digimundo</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <h6 class="text-xs font-semibold">{{ digimon.id }}</h6>
                        <h3 class="text-xl font-bold underline">{{ digimon.name }}</h3>
                        <img class="m-auto p-3" v-bind:src="digimon.images?.[0].href" v-bind:alt="digimon.name"
                            v-bind:title="digimon.name" />
                        <div class="flex flex-col w-full mt-3 mb-6">
                            <div class="flex justify-around mb-3">
                                <!-- Levels -->
                                <div class="flex flex-col">
                                    <h4 class="font-bold">Levels</h4>
                                    <span class="w-full" v-for="level in digimon.levels">{{ level.level }}</span>
                                    <!-- Si no tiene Niveles -->
                                    <span class="w-full" v-if="digimon.levels?.length === 0">N/A</span>
                                </div>
                                <!-- Attribute -->
                                <div class="flex flex-col">
                                    <h4 class="font-bold">Attribute</h4>
                                    <span class="w-full" v-if="digimon.attributes?.length"
                                        v-for="attributes in digimon.attributes">{{ attributes.attribute
                                        }}</span>
                                    <!-- Si no tiene atributos -->
                                    <span class="w-full" v-if="digimon.attributes?.length === 0">N/A</span>
                                </div>
                                <!-- Type -->
                                <div class="flex flex-col">
                                    <h4 class="font-bold">Type</h4>
                                    <span class="w-full" v-for="types in digimon.types">{{ types.type }}</span>
                                    <!-- Si no tiene tipos -->
                                    <span class="w-full" v-if="digimon.types?.length === 0">N/A</span>
                                </div>
                            </div>
                            <!-- Fields -->
                            <h4 class="font-bold mt-3">Fields</h4>
                            <div class="flex justify-around">
                                <img v-for="fields in digimon.fields" v-bind:src="fields.image" />
                                <!-- Si no tiene tipos -->
                                <span class="w-full" v-if="digimon.fields?.length === 0">N/A</span>
                            </div>
                        </div>

                        <Link :href="route('dashboard')"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Regresar
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
