<script setup lang="ts">
import { cn } from '@/lib/utils';
import { reactiveOmit } from '@vueuse/core';
import { DialogTitle, type DialogTitleProps } from 'reka-ui';
import type { HTMLAttributes } from 'vue';

const props = defineProps<
    DialogTitleProps & { class?: HTMLAttributes['class'] }
>();

const delegatedProps = reactiveOmit(props, 'class');
</script>

<template>
    <DialogTitle
        data-slot="sheet-title"
        :class="cn('text-foreground font-semibold', props.class)"
        v-bind="delegatedProps"
    >
        <slot />
    </DialogTitle>
</template>
