<script setup>
import { ref, onMounted } from 'vue';
import Button from './Button.vue';

const tasks = ref([]);

function getTasks() {
  fetch('http://172.16.15.10:80/api/tasks')
    .then(res => res.json())
    .then(json => tasks.value = json)
}
onMounted(() => {
  getTasks()
})
</script>

<template>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">番号</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">タイトル</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">内容</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">担当者</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="task in tasks" :key="task.id">
        <td class="px-6 py-4 whitespace-nowrap">{{ task.id }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.title }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.content }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.person_in_charge }}</td>
      </tr>
    </tbody>
  </table>
</template>