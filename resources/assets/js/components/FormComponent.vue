<template>
<div class="panel panel-default">
    <div class="panel-heading">¿Que quieres hacer hoy?</div>

    <div class="panel-body">
      <!-- Eliminamos la validacion de usuario ya que esa validacion se utiliza cuando se realizan peticiones, en este caso estamos manejando omponenetes -->
        <!--Creamos el formulario para agregar las tareas-->
        <form action="" v-on:submit.prevent="newTarea()">
          <div class="form-group">
            <label for="thought"> Tengo pendiente: </label>
            <input type="text" name="thought" class="form-control" v-model="description">
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary" name="button"> Agregar Tarea</button>
          </div>
        </form>
    </div>
</div>
</template>

<script>
    export default {
      data(){
        return {
          description:''
          }
      },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          newTarea(){
            const params = {
              //Creamos el parametro descripcion
              description: this.description
            };
            this.description = '';
            //ingresamos a la ruta del metodo store de laravel y pasamos los parametros
            axios.post('tareas',params).
              then((response)=> {
                //Si el registro es satisfactorio en el objeto tarea agregamos la data que nos envia devuelta el metodo stores de la API en laravel
                const tarea = response.data;
                //Enviamos la informacion al componente principal
                this.$emit('new',tarea);
              });
              
          }
        }
    }
</script>
