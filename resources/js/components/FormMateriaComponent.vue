<template>
    <div class="container">

        <div class="card">
            <div class="card-header">Listado de Materias</div>

            <div class="card-body">
                <form action="" v-on:submit.prevent ="newMateria()">    
                <div class="form-group">
                    <label for="thought"> Nombre de la MAteria  </label>
                    <input type="text" class="form-control" name="materia" v-model="name">
                </div>              
                <button type="submit" class="btn btn-primary"> Guardar Nota</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:''
            } 

        },
        mounted() {
            console.log('Component mounted en Materia.')
        },  
        methods: {
            newMateria(){
                const params = {
                    name: this.name
                };

                this.name='';

                axios.post('/materia', params)
                .then((response) =>{
                    const materia = response.data;
                    this.$emit('new', materia);
                });

                
            }
        }

    }   
</script>
