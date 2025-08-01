import { createRouter, createWebHistory } from 'vue-router';
import TaskList from './pages/TaskList.vue';
import TaskCreate from './pages/TaskCreate.vue';
import TaskShow from './pages/TaskShow.vue';

const routes = [
    {
        path: '/tasks', // ルートパスにアクセスしたときに
        component: TaskList, // TaskList コンポーネントを表示する
    },
    {
        path: '/task/create',
        component: TaskCreate,
    },
    {
        path: '/task/show/:id',
        component: TaskShow,
    }    
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;