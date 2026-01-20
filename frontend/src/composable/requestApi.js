import { ref, watch, computed } from 'vue'
import { useRoute } from 'vue-router'
import { api } from '@/lib/axios.ts'

export function useApiData(endpoint) {
    const nodes = ref([])
    const loading = ref(false)

    const route = useRoute()
    const locale = computed(() => route.params.locale || 'en')

    async function fetchData(lang) {
        loading.value = true
        try {
            const response = await api.get(`/${locale.value}/${endpoint}`)
            nodes.value = response.data
        } finally {
            loading.value = false
        }
    }

    watch(locale, fetchData, { immediate: true });

    return {
        nodes,
        loading,
        locale,
    }
}
