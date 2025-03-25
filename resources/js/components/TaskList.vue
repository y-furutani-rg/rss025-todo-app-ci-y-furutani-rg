<script setup>
import { ref, onMounted } from 'vue';
import Pencil from "@/components/icon/pencil.vue";
import Trash from "@/components/icon/trash.vue";

const tasks = ref([]);

function getTasks() {
  fetch('http://172.16.15.10:80/api/tasks')
    .then(res => res.json())
    .then(json => tasks.value = json);
}

onMounted(() => {
  getTasks();
});

<template>
  <div class="table-frame">
    <table>
      <thead>
        <tr>
          <th scope="col" class="th-cell number-width sticky-edge sticky-bg">
            番号
          </th>
          <th scope="col" class="th-cell title-width">
            タイトル
          </th>
          <th scope="col" class="th-cell content-width">
            内容
          </th>
          <th scope="col" class="th-cell staff-width">
            担当者
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id" class="hova">
          <td class="td-cell">{{ task.id }}</td>
          <td class="td-cell">{{ task.title }}</td>
          <td class="td-cell">{{ task.content }}</td>
          <td class="td-cell">{{ task.person_in_charge }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
/* scroll */
.table-frame {
  text-align: left;
  overflow-x: scroll;
  white-space: nowrap;
}

table {
  table-layout: fixed;
  width: 100%;
}

/* cell */
.th-cell {
  border-bottom: var(--color-table-border) solid 2px;
  padding: 16px;
  overflow: hidden;
  white-space: nowrap;
}

.td-cell {
  border-bottom: var(--color-table-border) solid 2px;
  padding: 16px;
  overflow: hidden;
  white-space: nowrap;
}

/* hover */
.hova:hover .sticky-bg {
  background-color: var(--color-table-border);
}

.hova:hover {
  background: var(--color-sub);
}

/* cell width */
.number-width {
  width: 5%;
}

.title-width {
  width: 20%;
}

.content-width {
  width: 35%;
}

.staff-width {
  width: 10%;
}
</style>