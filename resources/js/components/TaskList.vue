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
        <th scope="col" class="relative px-6 py-3">
          <span class="sr-only">詳細</span>
        </th>
        <th scope="col" class="relative px-6 py-3">
          <span class="sr-only">編集</span>
        </th>
        <th scope="col" class="relative px-6 py-3">
          <span class="sr-only">削除</span>
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="task in tasks" :key="task.id">
        <td class="px-6 py-4 whitespace-nowrap">{{ task.id }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.title }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.content }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ task.person_in_charge }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <Button :link="'/tasks/' + task.id" name="詳細" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <Button :link="'/tasks/' + task.id + '/edit'" name="編集" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <Button name="削除" @click="deleteTask(task.id)" />
        </td>
      </tr>
    </tbody>
  </table>
</template>