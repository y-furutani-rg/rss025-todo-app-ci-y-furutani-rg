<template>
    <form @submit.prevent="submitTask">
        <div class="w-80 mx-auto pt-4">
            <div class="mb-4">
                <label for="title" class="text-sm text-gray-500 font-medium">タイトル</label>
                <input id="title" type="text" class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md">
            </div>
            <div class="mb-4">
                <label for="content" class="text-sm text-gray-500 font-medium">内容</label>
                <textarea id="content" class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md"></textarea>        
            </div>
            <div class="mb-4">
                <label for="person_in_charge" class="text-sm text-gray-500 font-medium">担当者</label>
                <input id="person_in_charge" type="text" class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md">
            </div>
            <button type="submit" class="w-full p-[10px] bg-[var(--color-accent)] text-white text-center border-1 cursor-pointer rounded-md">追加</button>
        </div>
    </form>
    <div>
        <p>{{ form.content }}</p>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios'; 
import { API_URL } from '../api/globalApi.js';

const form = ref([
    {
        title: '',
        content: '',
        person_in_charge: ''
    }
]);

const submitTask = async() => {
    try {
        const response = await axios.post(API_URL);
        form.value.title = '';
        form.value.content = '';
        form.value.person_in_charge = '';        
    } catch (error) {
        console.error('データの送信に失敗しました', error);
    }
};

</script>