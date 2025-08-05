<script setup>
import Button from './Button.vue';
</script>

<template>
    <header class="flex">
        <Button link="/tasks">
            <p>タスク一覧</p>
        </Button>
        <Button link="/task/create">
            <p>タスク追加</p>
        </Button>
    </header>
</template>