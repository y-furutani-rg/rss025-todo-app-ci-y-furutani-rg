<script setup>
import { ref, onMounted, computed, watch } from "vue"
import { useFlashMessage } from '../composables/useFlashMessage.js'

const { flashMessageState } = useFlashMessage()

const isShown = ref(false)
const color = ref('success')
const message = ref('')

const displayFlashMessage = (messageData) => {
    if (messageData) {
        message.value = messageData.message
        color.value = messageData.color
        isShown.value = true

        setTimeout(() => {
            isShown.value = false
            localStorage.removeItem('FlashMessage')
        }, 5000)
    } else {
        isShown.value = false
    }
};

const readAndDisplayFlashMessageFromStorage = () => {
    const storedMessage = localStorage.getItem('FlashMessage')
    if (storedMessage) {
        const messageData = JSON.parse(storedMessage)
        flashMessageState.value = messageData
        localStorage.removeItem('FlashMessage')
    }
};

watch(flashMessageState, (newMessageData) => {
    displayFlashMessage(newMessageData)
}, { immediate: true });

onMounted(() => {
    readAndDisplayFlashMessageFromStorage()
});

const isSuccess = computed(() => {
    return color.value == "success"
});

const isError = computed(() => {
    return color.value == "error"
});

</script>
<template>
    <Transition name="flash-message-transition">
        <div v-if="isShown">
            <div
                class="alert-message-base"
                :class="{
                    'alert-message-success': isSuccess,
                    'alert-message-error': isError,
                }"
                role="alert"
            >
                <div class="m-auto items-center">
                    <h3 class="text-lg font-bold">{{ message }}</h3>
                </div>
            </div>
        </div>
    </Transition>
</template>
