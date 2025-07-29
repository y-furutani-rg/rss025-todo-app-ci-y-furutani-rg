<template>
    <div id="app-container">
        <Header></Header>
        <FlashMessage :key="$route.fullPath" />
        <router-view></router-view>
    </div>
</template>

<script>
import Header from './components/Header.vue';
import FlashMessage from './components/FlashMessage.vue';
export default {
    name: 'App',
    components: {
        Header,
        FlashMessage
    }
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>