<template>
    <div class="p-4">
        <table class="text-left w-full shadow-[5px_5px_13px_var(--color-shadow-dark),-5px_-5px_13px_var(--color-shadow-light)] table-fixed">
            <thead>
                <tr class="text-left border-b-2 border-[var(--color-table-border)]">
                    <th class="text-nowrap overflow-hidden p-4 w-1/10">番号</th>
                    <th class="text-nowrap overflow-hidden p-4 w-3/10">タイトル</th>
                    <th class="text-nowrap overflow-hidden p-4">内容</th>
                    <th class="text-nowrap overflow-hidden p-4 w-1/10">担当者</th>
                    <th class="text-nowrap overflow-hidden p-4 w-1/10">詳細</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id" class="hover:bg-[var(--color-sub)] text-left border-b-2 border-[var(--color-table-border)]">
                    <td class="text-nowrap overflow-hidden p-4">{{ task.id }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.title }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.content }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.person_in_charge }}</td>
                    <td class="text-nowrap overflow-hidden p-4">
                        <Button :link="`/task/show/${task.id}`" name="詳細" class="w-fit" ></Button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios'; 
import { API_URL } from '../api/globalApi.js';
import Button from '../components/Button.vue';
const tasks = ref([]);

const fetchTasks = async () => {
    try {
        const response = await axios.get(API_URL);
        tasks.value = response.data.data;
    } catch (error) {
        console.error('データの取得に失敗しました', error);
    }
};

onMounted(fetchTasks);

</script>