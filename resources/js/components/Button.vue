<script setup>
import { computed } from 'vue';
const props = defineProps({
    link: String,
    name: String,
    variant: {
        type: String,
        default: 'default',
    },
})
const buttonClasses = computed(() => {
    const baseStyles = "block m-2 px-4 py-2 text-sm font-medium shadow-sm border-1 border-gray-300 rounded-md hover:bg-gray-300 focus:outline-2 outline-blue-500 focus:outline-offset-2";
    const variantStyles = {
        default: "text-gray-500 bg-white",
        primary: "text-white bg-[var(--color-error)]",
    };
    return [baseStyles, variantStyles[props.variant] || variantStyles.default];
});
const componentTag = computed(() => {
  return props.link ? 'router-link' : 'button';
});
</script>

<template>
    <component :is="componentTag" :to ="link" :class="buttonClasses">
        <slot></slot>
        {{ name }}
    </component>
</template>