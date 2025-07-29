<script setup lang="ts">
interface Props {
    link:string;
    name:string;
}
defineProps<Props>();
</script>

<template>
    <router-link :to ="link" class="block text-gray-500 m-2 px-4 py-2 text-sm font-medium bg-white shadow-sm border-1 border-gray-300 rounded-md hover:bg-gray-300 focus:outline-2 outline-blue-500 focus:outline-offset-2">{{ name }}</router-link>
</template>