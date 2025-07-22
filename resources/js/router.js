import { createRouter, createWebHistory } from 'vue-router';
import TaskList from './pages/TaskList.vue';
import TaskCreate from './pages/TaskCreate.vue';

const routes = [
    {
        path: '/tasks', // ルートパスにアクセスしたときに
        component: TaskList, // TaskList コンポーネントを表示する
    },
    {
        path: '/tasks/create',
        component: TaskCreate,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;