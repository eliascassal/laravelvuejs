<template>
    <div class="container col-md-8 col-md-offset-2">
       <div class="row justify-content-center">
	        	<form-component  @new="addThought"></form-component>     
	        	<thought-component 
                    v-for="(thought, index) in thoughts" 
                    :key ="thought.id"
                    :thought="thought"
                    @update="updateThought(index, ...arguments)"
                    @delete="deleteThought(index)">

                </thought-component>         
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                thoughts: [{
                    'id':1,
                    'description':'abc',
                    'created_at':'17/10/2018'
                }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addThought(thought){
                this.thoughts.push(thought);
            },
            deleteThought(index) {
                this.thoughts.splice(index, 1);
            },
            updateThought(index) {

            }
        }
    }
</script>
