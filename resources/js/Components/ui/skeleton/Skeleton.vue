<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

interface SkeletonProps {
    class?: HTMLAttributes['class'];
}

const props = defineProps<SkeletonProps>();
</script>

<template>
    <div
        data-slot="skeleton"
        :class="cn('bg-primary/10 animate-pulse rounded-md', props.class)"
    />
</template>
