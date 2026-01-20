<script setup>
import { useApiData } from "@/composable/requestApi.js";

const {nodes, loading} = useApiData('products');
</script>

<template>
    <div>
        <h1>Vesti iz Drupala</h1>
        <div v-if="loading">Učitavanje...</div>

        <div
            v-for="node in nodes"
            :key="node.id"
            class="flex justify-center items-center bg-gray-100"
        >
            <img
                class="rounded"
                :src="'http://localhost:8081' + node.field_product_image"
            />

            <div class="p-6 text-center">
                <h5 class="text-2xl font-semibold">
                    {{ node.title }}
                </h5>
            </div>
        </div>
    </div>
</template>
