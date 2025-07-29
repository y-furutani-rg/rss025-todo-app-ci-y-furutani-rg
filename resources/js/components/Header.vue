<script setup>
import Button from './Button.vue';
</script>

<template>
    <header class="flex">
        <Button link="/tasks" name="タスク一覧" />
        <Button link="/task/create" name="タスク追加" />
    </header>
</template>