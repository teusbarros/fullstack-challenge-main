<template>
	<div class="modal modal-lg fade" tabindex="-1" :id="'weatherModal' + id" aria-labelledby="weatherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="weatherModalLabel">{{title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<h2 v-if="!apiResponse">Loading...</h2>
				<div v-else class="weather">
					<h2>{{weather.main}}</h2>
					<h4>{{weather.description}}</h4>

					<hr>

					<span class="badge bg-success"><fa-icon icon="fa-solid fa-clock" /> Current: {{ weather.temp }} &#176{{unit}}</span>
					<span class="badge bg-secondary"><fa-icon icon="fa-solid fa-face-laugh" /> Feels Like: {{ weather.feels_like }} &#176{{unit}}</span>
					<span class="badge bg-info"><fa-icon icon="fa-solid fa-arrow-down" /> Min.: {{ weather.temp_min }} &#176{{unit}}</span> 
					<span class="badge bg-warning"><fa-icon icon="fa-solid fa-arrow-up" /> Max.: {{ weather.temp_max }} &#176{{unit}}</span>
					<span class="badge bg-success"><fa-icon icon="fa-solid fa-droplet" /> Humidity: {{ weather.humidity }} %</span>
					<span class="badge bg-secondary"><fa-icon icon="fa-solid fa-eye" /> Visibility: {{ weather.visibility }} %</span>
					<span class="badge bg-info"><fa-icon icon="fa-solid fa-wind" /> Pressure: {{ weather.pressure }} mb</span> 
					
					<hr>

					<span class="badge bg-info"><fa-icon icon="fa-solid fa-location-dot" /> Latitude: {{ user.latitude}}</span> 
					<span class="badge bg-info"><fa-icon icon="fa-solid fa-location-dot" /> Longitude: {{ user.longitude}}</span> 
					<span class="badge bg-info"><fa-icon icon="fa-solid fa-server" /> Last update: {{ weather.last_update}} </span> 
				</div>
            </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: ['id', 'title', 'user', 'unit'],
		data(){
			return {
				apiResponse: false,
				weather: null
			}
		},
		mounted(){
			this.getUserWeather();
		},
		methods:{
			async getUserWeather(){
				const url = 'http://localhost';
				try {
					var response = await (await fetch(url + '/weather/' + this.id)).json();
					if (response) {
						this.apiResponse = true;
					}
					this.weather = response.data[0];
				} catch (error) {
					console.log(error);
					//#todo: handle error 
				}
			}
		}
	}
</script>

<style scoped>
.weather > span{
	margin: 10px;;
}
span.badge{
	font-size: 20px;
}
</style>

