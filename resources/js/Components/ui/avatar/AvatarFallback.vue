<script setup lang="ts">
import { cn } from '@/lib/utils';
import { reactiveOmit } from '@vueuse/core';
import { AvatarFallback, type AvatarFallbackProps } from 'reka-ui';
import type { HTMLAttributes } from 'vue';

const props = defineProps<
    AvatarFallbackProps & { class?: HTMLAttributes['class'] }
>();

const delegatedProps = reactiveOmit(props, 'class');
</script>

<template>
    <AvatarFallback
        data-slot="avatar-fallback"
        v-bind="delegatedProps"
        :class="
            cn(
                'bg-muted flex size-full items-center justify-center rounded-full',
                props.class,
            )
        "
    >
        <slot />
    </AvatarFallback>
</template>
