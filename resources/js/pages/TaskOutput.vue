<template>
  <div class="p-8 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Task Output</h1>
    <div class="mb-6 p-4 bg-gray-100 rounded">
      <div class="text-gray-700 mb-2"><strong>Task:</strong> {{ task.title || task.id }}</div>
      <div class="text-gray-600 text-sm mb-2">ID: {{ task.id }}</div>
      <div class="text-gray-800 whitespace-pre-wrap">
        <strong>Output:</strong>
        <pre class="bg-white p-3 rounded border mt-2 overflow-x-auto">{{ output }}</pre>
      </div>
    </div>
    <router-link :to="{ name: 'tasks.show', params: { task: task.id } }" class="text-blue-600 hover:underline">Back to Task</router-link>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  task: Object,
  output: String
});
</script>
