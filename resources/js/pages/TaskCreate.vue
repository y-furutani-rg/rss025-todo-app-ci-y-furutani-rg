<template>
    <form @submit.prevent="submitTask">
        <div class="w-80 mx-auto pt-4">
            <div class="mb-4">
                <label for="title" class="text-sm text-gray-500 font-medium">タイトル</label>
                    <input id="title" v-model="task.title" type="text" 
                    class="w-full py-2 px-4 border-1 focus:outline-none cursor-pointer rounded-md"
                    :class="{ 'border-black focus:border-blue-500':!validationErrors.title, 'border-red-500 focus:border-red-500':validationErrors.title }">
                <p v-if="validationErrors.title" class="mt-1 text-red-500 text-xs">
                {{ validationErrors.title[0] }}
                </p>                
            </div>
            <div class="mb-4">
                <label for="content" class="text-sm text-gray-500 font-medium">内容</label>
                <textarea id="content" v-model="task.content" 
                    class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md"
                    :class="{ 'border-black focus:border-blue-500':!validationErrors.content, 'border-red-500 focus:border-red-500':validationErrors.content }">
                </textarea>        
                <p v-if="validationErrors.content" class="mt-1 text-red-500 text-xs">
                {{ validationErrors.content[0] }}
                </p>

            </div>
            <div class="mb-4">
                <label for="person_in_charge" class="text-sm text-gray-500 font-medium">担当者</label>
                <input id="person_in_charge" v-model="task.person_in_charge" type="text" 
                    class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md"
                    :class="{ 'border-black focus:border-blue-500':!validationErrors.person_in_charge, 'border-red-500 focus:border-red-500':validationErrors.person_in_charge }">
                <p v-if="validationErrors.person_in_charge" class="mt-1 text-red-500 text-xs">
                {{ validationErrors.person_in_charge[0] }}
                </p>
            </div>
            <button type="submit" class="w-full p-[10px] bg-[var(--color-accent)] text-white text-center border-1 cursor-pointer rounded-md">追加</button>
        </div>
    </form>
</template>

<script setup>
import { ref, reactive } from 'vue';
import axios from 'axios'; 
import { API_URL_CREATE } from '../api/globalApi.js';
import { useRouter } from 'vue-router';
import { useFlashMessage } from '../composables/useFlashMessage.js';

const { setFlashMessage } = useFlashMessage();
const router = useRouter();
const task = ref({
    title: '',
    content: '',
    person_in_charge: ''
});

const validationErrors = reactive({});
const submitTask = async() => {
    try {
        const response = await axios.post(API_URL_CREATE, task.value);
        task.value.title = '';
        task.value.content = '';
        task.value.person_in_charge = '';        
        setFlashMessage('タスクの追加に成功しました。', 'success', true);
        router.push('/tasks');
    } catch (error) {
        if (error.response && error.response.status === 422) {
            Object.assign(validationErrors, error.response.data.validationErrors);
            setFlashMessage('入力欄を確認してください。', 'error');
        } else {
            console.error('データの送信に失敗しました', error);
            setFlashMessage('タスクの追加に失敗しました。', 'error');
        }
    }
};

</script>