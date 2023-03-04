<template>
	<div class="container p-5">
		<div v-if="!apiResponse">
			<h2>Loading...</h2>
		</div>
		<div v-else>
			<h2>Users:</h2>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Latitude</th>
						<th scope="col">Longitude</th>
						<th scope="col">Now</th>
						<th scope="col">!!!</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user in users" :key="user.id">
						<th scope="row">{{user.id}}</th>
						<td>{{user.name}}</td>
						<td>{{user.latitude}}</td>
						<td>{{user.longitude}}</td>
						<td>{{user.current_weather}}</td>
						<td>{{user.id}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default {
		data: () => ({
			apiResponse: false,
			users: null
		}),

		created() {
			this.fetchData()
		},

		methods: {
			async fetchData() {
				//#todo: set url as global const
				const url = 'http://localhost/'
				try {
					var response = await (await fetch(url)).json();
					console.log(response);
					if (response) {
						this.apiResponse = true;
					}
					this.users = response.users;
				} catch (error) {
					console.log(response);
					//#todo: handle error 
				}
			}
		}
	}
</script>

