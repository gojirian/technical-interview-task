<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { computed, ref }  from 'vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router, usePage } from '@inertiajs/vue3';
import type { Task } from '@/types/todo';
import TaskCard from '../components/TaskCard.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const page = usePage();
const tasks = ref<Task[]>(page.props.tasks as Task[]);

const orderedTasks = computed(() => {
    return [...tasks.value].sort((a, b) => {
        if (a.status === 'completed' && b.status !== 'completed') return 1;
        if (b.status === 'completed' && a.status !== 'completed') return -1;
        return new Date(b.created_at).getTime() - new Date(a.created_at).getTime();
    });
});

function reload() {    
    router.reload({
        onFinish: () => {
            tasks.value = page.props.tasks as Task[];
        },
    });
}
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col gap-4 p-4">
            <h2 class="text-2xl font-bold mb-4">Tasks</h2>
            <div v-if="tasks.length === 0">No tasks found.</div>
            <div v-else class="space-y-4">
                <TaskCard v-for="task in orderedTasks" :key="task.id" :task="task" @updated="reload" />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
</style>
