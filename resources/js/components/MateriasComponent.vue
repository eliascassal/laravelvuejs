<template>
    <div class="container col-md-8 col-md-offset-2">
       <div class="row justify-content-center">
	        	<formMateria-component  @new="addMateria"></formMateria-component>     
	        	<materia-component 
                    v-for="(materia, index) in materias" 
                    :key ="materia.id"
                    :materia="materia"
                    @update="updateMateria(index, ...arguments)"
                    @delete="deleteMateria(index)">

                </materia-component>         
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                materias: []
            }
        }, 
        mounted() {
            axios.get('/materia').then((response)=> {
                this.materias=response.data;
            });
        },
        methods:{
            addThought(materias){
                this.materias.push(materia);
            },
            deleteThought(index) {
                this.materias.splice(index, 1);
            },
            updateThought(index, materia) {
                this.materias[index]=materia;

            }
        }
    }
</script>
