<script setup>
import {useApiData} from "@/composable/requestApi.js";

const {nodes, loading} = useApiData('/football/club');
</script>

<template>
    <div>
        <h1>Fudblaski Klubovi</h1>
        <div v-if="loading">Učitavanje...</div>

        <div
            v-for="node in nodes"
            :key="node.id"
            class="flex justify-center items-center bg-gray-100"
        >

            <div class="p-6 text-center">
                <h5 class="text-2xl font-semibold">
                    {{ node.title }}
                </h5>
            </div>
        </div>
    </div>
</template>