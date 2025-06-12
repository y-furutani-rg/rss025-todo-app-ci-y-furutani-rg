<script setup>
import { ref, onMounted, computed, watch } from "vue"
import { useFlashMessage } from '../composables/useFlashMessage.js'

const { immediateFlashMessageState, getPersistedFlashMessage } = useFlashMessage()

const isShown = ref(false)
const color = ref('success')
const message = ref('')
let dismissTimeout = null

const displayFlashMessage = (messageData) => {
    if (dismissTimeout) {
        clearTimeout(dismissTimeout)
    }

    if (messageData) {
        message.value = messageData.message
        color.value = messageData.color
        isShown.value = true

        dismissTimeout = setTimeout(() => {
            isShown.value = false
            if (immediateFlashMessageState.value === messageData) {
                immediateFlashMessageState.value = null
            }
        }, 5000)
    } else {
        isShown.value = false
    }
}

watch(immediateFlashMessageState, (newMessageData) => {
    displayFlashMessage(newMessageData)
}, { immediate: true })

onMounted(() => {
    const persistedMessage = getPersistedFlashMessage()
    if (persistedMessage) {
        displayFlashMessage(persistedMessage)
    }
})

const isSuccess = computed(() => {
    return color.value == "success"
})

const isError = computed(() => {
    return color.value == "error"
})

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