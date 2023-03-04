<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Fullstack Challenge</RouterLink>
      </nav>
    </div>
  </header>
  <RouterView />
</template>

<style scoped>
header{
  margin-bottom: 25px;
}
</style>
