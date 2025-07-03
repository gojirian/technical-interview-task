<script setup lang="ts">
import type { Page } from '@/types/todo';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const { page } = defineProps<{
    page: Page;
}>();

</script>

<template>
    <Head :title="page.title" />
    <AppLayout>
        <div class="flex flex-col items-center justify-center min-h-[60vh] p-8">
            <div
                class="w-full max-w-2xl bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-2xl shadow-lg p-8 border border-blue-200 dark:border-blue-800"
            >
                <h1 class="text-3xl font-bold mb-3 text-blue-900 dark:text-blue-200">{{ page.title }}</h1>
                <p class="mb-5 text-lg text-gray-700 dark:text-gray-200" v-if="page.description">{{ page.description }}</p>
                <div class="mb-6 text-sm text-gray-500">
                    Created: {{ page.created_at }}
                </div>
                <div class="prose dark:prose-invert max-w-none" v-html="page.content"></div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.prose :deep(h1) {
  font-size: 2rem;
  font-weight: bold;
}
</style>
