<template>
	<div>
	<nav class="navbar navbar-dark bg-primary">
		
			<a href="#" class="navbar-brand">Materia</a>
			<a href="#" class="navbar-brand">Horario</a>
			<a href="#" class="navbar-brand">Docentes</a>
			<a href="#" class="navbar-brand">Carreras</a>
			<a href="#" v-on: click = "ShowForm" class="navbar-brand">Aulas</a>
		
	</nav>

		
		<materia-component v-if="show[1]"></materia-component>
		<horario-component v-else-if="show[2]"></horario-component>
		<docente-component v-else-if="show[3]"></docente-component>
		<aula-component v-else-if="show[4]"></aula-component>
		<carrera-component v-else="show[5]"></carrera-component>

	</div>
	
</template>
<script>
	export default {
        data(){
            return{
                show: []
            }
        },
        mounted() {
            console.log('Component mounted in menu.');
        }.
        methods(){

        function ShowForm()
        show:  [0,0,0,1,0]


        }
    }
</script>