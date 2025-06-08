export function useFlashMessage() {
    const setFlashMessage = (message, color) => {
    localStorage.setItem('FlashMessage', JSON.stringify({
        message: message,
        color: color,
        }))
    }

    return { setFlashMessage }
}