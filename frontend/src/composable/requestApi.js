import { ref, watch, computed } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

export function useApiData(endpoint) {
    const nodes = ref([])
    const loading = ref(false)

    const route = useRoute()
    const locale = computed(() => route.params.locale || 'en')

    async function fetchClubs(lang) {
        loading.value = true
        try {
            const response = await axios.get(
                `http://localhost:8082/${locale.value}/${endpoint}`
            )
            nodes.value = response.data
        } finally {
            loading.value = false
        }
    }

    watch(locale, fetchClubs, { immediate: true })

    return {
        nodes,
        loading,
        locale,
    }
}