<script setup>
    import { computed } from 'vue';
    import { useRoute, useRouter } from 'vue-router';

    const route = useRoute();
    const router = useRouter();

    const availableLocales = ['en', 'sr']

    const currentLocale = computed(() => route.params.locale || 'en')

    function switchLocale(locale) {
        router.push({
            name: route.name,
            params: {
                ...route.params,
                locale,
            }
        })
    }
</script>

<template>
    <div class="flex gap-2">
        <button
            v-for="locale in availableLocales"
            :key="locale"
            @click="switchLocale(locale)"
            :class="[
        'px-3 py-1 rounded',
        locale === currentLocale ? 'bg-blue-600 text-white' : 'bg-gray-200'
      ]"
        >
            {{ locale.toUpperCase() }}
        </button>
    </div>
</template>
