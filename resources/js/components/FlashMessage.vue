<script setup>
import { ref, onMounted, computed } from "vue";

const isShown = ref(false);
const color = ref('success');
const message = ref('');

onMounted(() => {
    const storedMessage = localStorage.getItem('FlashMessage');

    if (storedMessage) {
        const messageData = JSON.parse(storedMessage);

        message.value = messageData.message;
        color.value = messageData.color;
        isShown.value = true;

        localStorage.removeItem('FlashMessage');
        
        setTimeout(() => {
            isShown.value = false;
        }, 5000);
    }
})

const isSuccess = computed(() => {
    return color.value == "success";
});

const isError = computed(() => {
    return color.value == "error";
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