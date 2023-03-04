<script setup lang="ts">
	import ApiTest from "@/components/ApiTest.vue";
	import TableVue from "@/components/TableVue.vue";
</script>

<template>
	<main>
		<table-vue @loadModal="getUserInfo(e)"></table-vue>
		<div class="">
		</div>
	</main>
</template>
