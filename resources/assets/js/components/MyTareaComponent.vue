<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!--Acá llamamos al componente de vueJS. Ademas de recibir los eventos que se declararon en el script TareaComponent-->
            <form-component @new="addTarea"></form-component>
            <tarea-component v-for="(tarea, index) in tareas" 
                    :key="tarea.id" 
                    :tarea="tarea"
                    @update ="updateTarea(index,...arguments)"
                    @delete="deleteTarea(index)">
            </tarea-component>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                tareas:[]
            }
        },
        mounted() {
        axios.get('tareas').then((response) => {
                this.tareas = response.data;
            });
        },
        methods:{
            addTarea(tarea){
                this.tareas.push(tarea);
            },
            updateTarea(index,tarea){ 
                this.tareas[index]=tarea;
            },
            deleteTarea(index){ 
                this.tareas.splice(index, 1);
            }
        }
    }
</script>
