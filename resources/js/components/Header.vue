<script setup>
import Button from './Button.vue';
</script>

<template>
    <header class="flex">
        <Button link="http://localhost/tasks" name="タスク一覧" />
        <Button link="http://localhost/task/create" name="タスク追加" />
    </header>
</template>