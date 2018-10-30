<template>
    <div class="container">

    <div class="card">
        <div class="card-header">hola deseas anotar algo</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent ="newThought()">    
            <div class="form-group">
                <label for="thought"> Ahora estoy pensando anotar:  </label>
                <input type="text" class="form-control" name="thought" v-model="description">
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
                description:''
            } 

        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought(){
                let thought = {
                    id: 2,
                    description: this.description,
                    created_at:'11/11/1111'
                    };
                this.$emit('new', thought);
                this.description='';
                }
            }

        }   
</script>
