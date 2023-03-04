<template>
	<div class="modal fade" tabindex="-1" :id="'weatherModal' + id" aria-labelledby="weatherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="weatherModalLabel">{{title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Reload</button>
				</div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: ['id', 'title'],
		mounted(){
			this.getUserWeather();
		},
		methods:{
			getUserWeather(){
				console.log('Pegando os dados do user:' + this.id);
			}
		}
	}
</script>

