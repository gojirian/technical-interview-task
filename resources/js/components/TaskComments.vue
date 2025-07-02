<script setup lang="ts">
import type { Comment } from '@/types/todo';

defineProps<{ comments: Comment[] }>();
</script>

<template>
    <div class="mt-2">
        <strong>Comments:</strong>
        <ul class="list-disc ml-5">
            <li v-for="comment in comments" :key="comment.id">
                <span v-if="comment.user">{{ comment.user.name }}:</span>
                {{ comment.body }}
            </li>
        </ul>
    </div>
</template>
