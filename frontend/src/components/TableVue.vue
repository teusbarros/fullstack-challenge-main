<template>
	<div class="container p-5">
		<div v-if="!apiResponse">
			<h2>Loading...</h2>
		</div>
		<div v-else>
			<h2 class="txt-center mb-3">Users</h2>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Latitude</th>
						<th scope="col">Longitude</th>
						<th scope="col">Now</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user in users" :key="user.id">
						<th scope="row">{{user.id}}</th>
						<td>{{user.name}}</td>
						<td>{{user.latitude}}</td>
						<td>{{user.longitude}}</td>
						<td>{{user.current_weather}}&#176{{globlaUnit}}</td>
						<td>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#weatherModal'+user.id">
								<fa-icon icon="fa-solid fa-eye" />
							</button>
							<modal-vue :id="user.id" :title="user.name" :user="user" :unit="globlaUnit"></modal-vue>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	import ModalVue from "@/components/ModalVue.vue";

	export default {
		components:{
			ModalVue,
		},
		data: () => ({
			apiResponse: false,
			users: null,
			globlaUnit: 'F'
		}),

		created() {
			this.fetchData()
		},
		methods: {
			async fetchData() {
				const url = 'http://localhost/'
				try {
					var response = await (await fetch(url)).json();
					if (response) {
						this.apiResponse = true;
					}
					this.users = response.data;
				} catch (error) {
					console.log(error);
				}
			}
		}
	}
</script>

