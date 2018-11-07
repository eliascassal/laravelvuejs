<template>
    <div class="container">
        <div class="card">
         <div class="card-header">
            <p>
                publicado el: {{ thought.created_at }}
                ultima actualizacion: {{ thought.updated_at }}
            </p>
         </div>
            <div class="card-body">

                <input v-if="editMode" type="text" class="form-control" v-model="thought.description">
                    <p v-else>
                        {{ thought.description }}
                    </p>
            </div>

            <div class="card-footer">
                    <button v-if="editMode" type="submit" class="btn btn-default" v-on:click="onClickUpdate()"> Guardar Cambios</button>
                    <button v-else type="submit" class="btn btn-default" v-on:click="onClickEdit()"> Editar</button>
                    <button type="submit" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['thought'],
        data(){
            return {
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            onClickDelete(){
                var str1 = "/thoughts/";
                var str2 = this.thought.id;
                var res = str1.concat(str2);
                  axios.delete(res).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit(){
                this.editMode=true;
            },
            onClickUpdate(){
                const params = {
                    description: this.thought.description,
                };
                var str1 = "/thoughts/";
                var str2 = this.thought.id;
                var res = str1.concat(str2);

                axios.put(res, params).then((response) => {
                    this.editMode=false;
                    const thought = response.data;
                    this.$emit('update', thought);
                });
                
            }
        }
    }
</script>
