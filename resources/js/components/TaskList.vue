<script setup>
  import { ref, onMounted } from 'vue';
  import { API_URL } from '../api/globalApi.js';

  const tasks = ref([])

  function getTasks() {
    fetch(API_URL)
      .then(res => res.json())
      .then(json => tasks.value = json)
  }

  onMounted(() => {
    getTasks()
  })
</script>

<template>
  <div class="overflow-x-auto p-4">
    <table class="min-w-full border-collapse border border-[var(--color-table-border)] shadow-lg shadow-[var(--color-shadow-light)]">
      <thead class="bg-white">
        <tr class="border-b border-[var(--color-table-border)]">
          <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 whitespace-nowrap">番号</th>
          <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 whitespace-nowrap">タイトル</th>
          <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 whitespace-nowrap">内容</th>
          <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 whitespace-nowrap">担当者</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id" class="hover:bg-[var(--color-sub)]">
          <td class="border-b border-[var(--color-table-border)] px-4 py-4 text-sm text-gray-700 whitespace-nowrap">{{ task.id }}</td>
          <td class="border-b border-[var(--color-table-border)] px-4 py-4 text-sm text-gray-700 whitespace-nowrap">{{ task.title }}</td>
          <td class="border-b border-[var(--color-table-border)] px-4 py-4 text-sm text-gray-700 whitespace-nowrap">{{ task.content }}</td>
          <td class="border-b border-[var(--color-table-border)] px-4 py-4 text-sm text-gray-700 whitespace-nowrap">{{ task.person_in_charge }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
