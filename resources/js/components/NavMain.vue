<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Page } from '@/types/todo';
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    items: NavItem[];
}>();

const page = usePage();


const pages = ref<Page[]>(page.props.pages as Page[]);
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <SidebarMenuButton as-child :is-active="item.href === page.url" :tooltip="item.title">
                    <Link :href="item.href">
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                    </Link>
                    <!-- pages -->
                </SidebarMenuButton>
            </SidebarMenuItem>
            <SidebarMenuItem v-for="pageItem in pages" :key="pageItem.id">
                <SidebarMenuButton as-child :is-active="`/pages/${pageItem.id}` === page.url" :tooltip="pageItem.title">
                    <Link :href="`/pages/${pageItem.id}`">
                        <span>{{ pageItem.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/tasks') && page.url.endsWith('/output')" tooltip="Task Output Demo">
                    <Link :href="'/tasks/1/output'">
                        <span>Task Output Demo</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
