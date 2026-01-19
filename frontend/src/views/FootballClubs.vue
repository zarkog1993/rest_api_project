<script setup>
import { useApiData } from "@/composable/requestApi.js";

const {nodes, loading} = useApiData('football/club');
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

            <div class="card bg-base-100 w-96 shadow-sm">
                <h2 class="card-title" v-html="node.title"></h2>
                <div v-html="node.body"></div>
            </div>
        </div>
    </div>
</template>
