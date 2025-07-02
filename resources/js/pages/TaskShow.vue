<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import type { Task } from '@/types/todo';
// import TaskComments from '../components/TaskComments.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

// const page = usePage();

// TODO: get the task from Inertia page props, or use a fake fallback
const task: Task = {
    id: 1,
    title: 'Sample Task',
    description: 'This is a sample task for demonstration purposes.',
    status: 'pending',
    created_at: new Date().toLocaleString(),
    updated_at: '',
    comments: []
};

</script>


<template>
    <Head :title="task.title" />
    <AppLayout>
        <div class="flex flex-col items-center justify-center min-h-[60vh] p-8">
            <!--
                INSTRUCTIONS FOR INTERVIEWEE:

                Scaffolded Task Details Page. Wire up the UI to display the task details and handle actions using Inertia responses.
                - Display the task's title, description, status, and created_at date.
                - Add a button to mark the task as complete (POST to `/tasks/{task}/complete`).
                - Add a button to delete the task (DELETE to `/tasks/{task}`).
                - Show a message or UI indicator if the task is already completed.
                - (Optional) Render comments or related info if you wish.
                - Use Inertia form helpers or your preferred method for actions.
            -->
            <div
                class="w-full max-w-2xl bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-2xl shadow-lg p-8 border border-blue-200 dark:border-blue-800"
            >
                <h1 class="text-3xl font-bold mb-3 text-blue-900 dark:text-blue-200">{{ task.title }}</h1>
                <p class="mb-5 text-lg text-gray-700 dark:text-gray-200">{{ task.description }}</p>
                <div class="mb-3 flex items-center gap-2">
                    <span class="font-semibold">Status:</span>
                    <span :class="task.status === 'completed' ? 'text-green-600' : 'text-yellow-400'">
                        {{ task.status }}
                    </span>
                    <span v-if="task.status === 'completed'" class="ml-2 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Completed</span>
                </div>
                <div class="mb-6 text-sm text-gray-500">
                    Created: {{ task.created_at }}
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-4">
                    <!--
                        INSTRUCTIONS FOR INTERVIEWEE:
                        - Wire up the Complete and Delete buttons below to call the appropriate Inertia endpoints.
                        - The Complete button should POST to `/tasks/{task}/complete`.
                        - The Delete button should DELETE to `/tasks/{task}`.
                        - Disable the Complete button if the task is already completed.
                    -->
                    <button
                        class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded shadow disabled:opacity-50 transition"
                        :disabled="task.status === 'completed'"
                    >
                        <!-- TODO: Call Inertia POST to complete endpoint -->
                        Complete
                    </button>
                    <button
                        class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded shadow transition"
                    >
                        <!-- TODO: Call Inertia DELETE to delete endpoint -->
                        Delete
                    </button>
                </div>

                <!--
                    TODO: (Optional) Render comments or related info here.
                -->
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
</style>
