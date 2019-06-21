<template>
  <div class="panel panel-default">
      <div class="panel-heading">Editado el {{tarea.created_at}}</div>
      <div class="panel-body">
          <!--resumen de las tareas agregadas-->
          <form action="">
            <div class="form-group">
              <input v-if="editMode" type="text" class="form-control" v-model="tarea.description">
              <p v-else> {{tarea.description}}</p>
            </div>
          </form>
      </div>
      <div class="panel-footer">
          <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Guardar</button>
          <button v-else class="btn btn-default" v-on:click="onClickEdit()">Modificar</button>
          <button class="btn btn-danger" v-on:click="onClickDelete()"> Eliminar </button>
     </div>
  </div>
</template>

<script>
    export default {
      props:['tarea'],
      data(){
        return{
          editMode: false
        };
      },
      mounted() {
        console.log('Component mounted.')
      },
      methods:{
        onClickDelete(){
          axios.delete('tareas/'+this.tarea.id).then(() => {
          this.$emit('delete');
          });
        },
        onClickEdit(){
          this.editMode = true;
        },
        onClickUpdate(){
          const params = {
            description: this.tarea.description
          };
          axios.put('tareas/'+ this.tarea.id, params).then((response) => {
            this.editMode = false;
            const tarea = response.data;
            this.$emit('update', tarea);
          });
        }
      }
    }
</script>
