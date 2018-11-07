
<template>
	<div class="row">
			<div class="col-sm">
				<div class="card text-center" Style= "width: 18rem; margin-top:50px;">
						<img Style= "width: 100px; height: 100px; background-color:#EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block"  src="/images/qm9897332054.jpg" alt="">
					<div class="card-body text-center">
						<input v-if="editMode" type="text" class="form-control" v-model="materia.name">
                        <p v-else> {{materia.name}}</p>
						<p class="card-text"> una descripcion de ejemplo para rellenar con un poco de codigo hardCode y que nos muestre como esta quedando la listilla aguante informatica </p>
					</div>
                    <div class="card-footer">
                        <button v-if="editMode" type="submit" class="btn btn-default" v-on:click="onClickUpdate()"> Guardar Cambios</button>
                        <button v-else type="submit" class="btn btn-default" v-on:click="onClickEdit()"> Editar</button>
                        <button type="submit" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                    </div>
				</div>
			</div>
	</div>
</template>
<script>
    export default {
        props: ['materia'],
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
                var str1 = "/materia/";
                var str2 = this.materia.id;
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
                    name: this.materia.name,
                };
                var str1 = "/materia/";
                var str2 = this.materia.id;
                var res = str1.concat(str2);

                axios.put(res, params).then((response) => {
                    this.editMode=false;
                    const materia = response.data;
                    this.$emit('update', materia);
                });
                
            }
        }
    }
</script>
