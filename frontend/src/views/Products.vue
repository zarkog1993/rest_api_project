<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import { useRoute } from "vue-router";

const nodes = ref([])
const loading = ref(true)

const route = useRoute()
const locale = computed(() => route.params.locale)

const API_URL = `http://localhost:8082/${locale.value}/products`

onMounted(async () => {
    try {
        const response = await axios.get(API_URL)
        nodes.value = response.data

    } catch (e) {
        console.error(e)
    } finally {
        loading.value = false
    }
})
</script>

<template>
    <div>
        <h1>Vesti iz Drupala</h1>

        <nav>
            <label for="language">Chose Language:</label>
            <select name="language" id="language">
                <option value="Srpski"><a :href="API_URL"></a></option>
                <option value="Engleski">Engleski</option>
            </select>
        </nav>

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