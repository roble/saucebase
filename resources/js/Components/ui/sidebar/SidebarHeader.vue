<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();
</script>

<template>
    <div
        data-slot="sidebar-header"
        data-sidebar="header"
        :class="cn('flex flex-col gap-2 p-2', props.class)"
    >
        <slot />
    </div>
</template>
