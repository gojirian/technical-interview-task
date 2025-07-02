<script setup lang="ts">
import type { Task } from '@/types/todo';
import { router } from '@inertiajs/vue3';
import { defineEmits } from 'vue';

const emit = defineEmits(['updated']);

const props = defineProps<{ task: Task }>();

function completeTask() {
    // TODO: Implement the logic to mark the task as completed.
    // Hint: Use the router to send a POST request to `/tasks/${props.task.id}/complete`
    // and emit the 'updated' event when done.
}

function deleteTask() {
    // TODO: Implement the logic to delete the task.
    // Hint: Use the router to send a DELETE request to `/tasks/${props.task.id}`
    // and emit the 'updated' event when done.
}
</script>

<template>
    <div class="cursor-pointer w-full max-w-2xl bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-2xl shadow-lg p-8 border border-blue-200 dark:border-blue-800" @click="() => $inertia.visit(`/tasks/${task.id}`)">
        <div class="flex justify-end space-x-2 mb-2">
            <button v-if="task.status != 'completed'" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors" @click.stop="completeTask">Complete</button>
            <button v-else class="px-3 py-1 text-sm bg-green-600 text-white rounded hover:bg-green-700 transition-colors" disabled>Completed</button>
            <button class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition-colors" @click.stop="deleteTask">Delete</button>
        </div>
        <div class="p-4 ">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold">{{ task.title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ task.description }}</p>
                    <span class="text-xs text-gray-500">Status: {{ task.status }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
