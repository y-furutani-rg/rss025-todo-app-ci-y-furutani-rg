import { ref } from 'vue'

const currentFlashMessage = ref(null)

export function useFlashMessage() {
    const setFlashMessage = (message, color) => {
        const messageData = {
            message: message,
            color: color,
        }
        localStorage.setItem('FlashMessage', JSON.stringify(messageData))
        currentFlashMessage.value = messageData
    }

    return { 
        setFlashMessage,
        flashMessageState: currentFlashMessage,
    }
}