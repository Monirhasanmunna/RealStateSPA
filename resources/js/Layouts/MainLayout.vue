<script setup>
import HeaderComponent from './HeaderComponent.vue';
</script>

<template>

<HeaderComponent/>
<!-- Page Content -->
<main class="h-screen">
    <div class="py-5 px-5 m-3 border-2 border-dashed border-gray-300 space-y-6">
        <slot/>
    </div>
</main>
</template>

<style scoped>

</style>
