import { ref } from 'vue'

const immediateFlashMessage = ref(null)

export function useFlashMessage() {
    const setFlashMessage = (message, color, persist = false) => {
        const messageData = {
            message: message,
            color: color,
        }

        if (persist) {
            localStorage.setItem('FlashMessage', JSON.stringify(messageData))
        } else {
            immediateFlashMessage.value = messageData
        }
    }

    const getPersistedFlashMessage = () => {
        const storedMessage = localStorage.getItem('FlashMessage')
        if (storedMessage) {
            localStorage.removeItem('FlashMessage')
            return JSON.parse(storedMessage)
        }
        return null
    }

    return {
        setFlashMessage,
        immediateFlashMessageState: immediateFlashMessage,
        getPersistedFlashMessage,
    }
}