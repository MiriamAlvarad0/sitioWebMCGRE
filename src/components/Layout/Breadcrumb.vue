<template>
    <nav aria-label="">
        <ol class="">
            <!-- <li class="breadcrumb-item"><a href="/">Inicio</a></li> -->
            <!-- <li class="breadcrumb-item active" aria-current="page" v-for="item in items" :key="item.path">{{ item.name }}</li> -->
        </ol>
    </nav>
</template>


<script setup>
    import { useRoute } from 'vue-router'
    import { computed } from 'vue';
  
    const route = useRoute()


    const items = computed(() =>{
        return route.matched
    })
</script>


<style scoped>
   
   
   
</style>
