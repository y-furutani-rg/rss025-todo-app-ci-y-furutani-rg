<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { API_URL } from '../api/globalApi'
import { useFlashMessage } from '../composables/useFlashMessage'
import FlashMessage from './FlashMessage.vue'

const router = useRouter();
const { setFlashMessage } = useFlashMessage()

const newTask = ref({
    title: '',
    content: '',
    person_in_charge: '',
})

const validationErrors = ref({
    title: null,
    content: null,
    person_in_charge: null,
})

const addTask = async () => {
    try {
        const response = await fetch(`${API_URL}/create`, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(newTask.value),
        })

        if (response.ok) {
            setFlashMessage('タスクが正常に追加されました。', 'success', true)
            router.push('/tasks')
        } else {
            const responseData = await response.json();
            validationErrors.value.title = responseData.errors.title ? responseData.errors.title.join('<br>') : null
            validationErrors.value.content = responseData.errors.content ? responseData.errors.content.join('<br>') : null
            validationErrors.value.person_in_charge = responseData.errors.person_in_charge ? responseData.errors.person_in_charge.join('<br>') : null
            
            setFlashMessage('タスクの追加に失敗しました。', 'error')
        }
    } catch (error) {
        console.error(error)
        setFlashMessage('タスクの追加に失敗しました。', 'error')
    }
}
</script>

<template>
    <FlashMessage> </FlashMessage>
    <div class="w-sm mx-auto">
        <form @submit.prevent="addTask()">
            <div class="mt-4">
                <label for="title" class="text-sm font-medium text-gray-700 mb-4">タイトル</label>
                <input 
                    id="title" 
                    type="text" 
                    class="w-full py-2 px-4 border rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-600"
                    v-model="newTask.title"
                    :class="{ 'border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500': validationErrors.title }"
                >
                <p v-if="validationErrors.title" class="text-red-500 text-xs mt-1">{{ validationErrors.title }}</p>
            </div>
            <div class="mt-4">
                <label for="content" class="text-sm font-medium text-gray-700 mb-4">内容</label>
                <textarea 
                    name="" 
                    id="content" 
                    class="w-full py-2 px-4 border rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-600"
                    v-model="newTask.content"
                    :class="{ 'border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500': validationErrors.content }"
                ></textarea>
                <p v-if="validationErrors.content" class="text-red-500 text-xs mt-1">{{ validationErrors.content }}</p>
            </div>
            <div class="mt-4">
                <label for="person_in_charge" class="text-sm font-medium text-gray-700 mb-4">担当者</label>
                <input 
                    id="person_in_charge" 
                    type="text" 
                    class="w-full py-2 px-4 border rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-600"
                    v-model="newTask.person_in_charge"
                    :class="{ 'border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500': validationErrors.person_in_charge }"
                >
                <p v-if="validationErrors.person_in_charge" class="text-red-500 text-xs mt-1">{{ validationErrors.person_in_charge }}</p>
            </div>
            <button 
                type="submit" 
                class="mt-4 w-full p-[10px] text-white border rounded-lg cursor-pointer"
            >追加</button>
        </form>
    </div>
</template>

<style scoped>
button {
    background-color: var(--color-accent);
}
</style>