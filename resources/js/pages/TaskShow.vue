<template>
    <div v-if="task" class="w-80 mx-auto pt-4">
        <div class="mb-4">
            <label for="title" class="text-sm text-gray-500 font-medium">タイトル</label>
            <input 
                id="title" 
                v-model="task.title" 
                type="text" 
                class="w-full py-2 px-4 border-1 rounded-md"
                disabled>
            </input>
            </div>
        <div class="mb-4">
            <label for="content" class="text-sm text-gray-500 font-medium">内容</label>
            <textarea 
                id="content" 
                v-model="task.content" 
                class="w-full py-2 px-4 border-1 rounded-md"
                disabled>
            </textarea>      
        </div>
        <div class="mb-4">
            <label for="person_in_charge" class="text-sm text-gray-500 font-medium">担当者</label>
            <input 
                id="person_in_charge" 
                v-model="task.person_in_charge" 
                type="text" 
                class="w-full py-2 px-4 border-1 rounded-md"
                disabled>
            </input>
        </div>
        <Button link="/tasks" name="戻る" class="text-center"></Button>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios'; 
import { useRoute } from 'vue-router';
import { API_URL_SHOW } from '../api/globalApi.js';
import Button from '../components/Button.vue';

const router = useRoute();
const task = ref();

const fetchTask = async (id) => {
    try {
        const response = await axios.get(API_URL_SHOW(id));
        task.value = response.data.data;
    } catch (error) {
        console.error('データの取得に失敗しました', error);
    }
};

onMounted(() => {
    const id = router.params.id;
    if (id) {
        fetchTask(id);
    }
});

</script>