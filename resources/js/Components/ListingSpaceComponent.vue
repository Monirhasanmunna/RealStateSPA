<script setup>
    defineProps({
        listing:Object,
    });
</script>

<template>
    <div class="dark:text-gray-400">
      <span class="font-bold">{{ listing.beds }}</span> beds <span class="text-gray-400">| </span>  
      <span class="font-bold">{{ listing.baths }}</span> baths <span class="text-gray-400">| </span>
      <span class="font-bold">{{ listing.area }}</span> m²
    </div>
</template>

<style scoped>

</style>