<template>
    <div id="app-container">
        <FlashMessage :key="$route.fullPath" />
        <router-view></router-view>
    </div>
</template>

<script>
import FlashMessage from './components/FlashMessage.vue';
export default {
    name: 'App',
    components: {
        FlashMessage
    }
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>