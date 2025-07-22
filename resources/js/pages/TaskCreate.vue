<template>
    <form>
        <div class="w-80 mx-auto pt-4">
            <div class="mb-4">
                <label class="text-sm text-gray-500 font-medium">タイトル</label>
                <input type="text" class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md">
            </div>
            <div class="mb-4">
                <label class="text-sm text-gray-500 font-medium">内容</label>
                <textarea class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md"></textarea>        
            </div>
            <div class="mb-4">
                <label class="text-sm text-gray-500 font-medium">担当者</label>
                <input type="text" class="w-full py-2 px-4 border-1 focus:outline-none focus:border-blue-500 cursor-pointer rounded-md">
            </div>
            <button type="submit" class="w-full p-[10px] bg-[var(--color-accent)] text-white text-center border-1 cursor-pointer rounded-md">追加</button>
        </div>
    </form>
</template>