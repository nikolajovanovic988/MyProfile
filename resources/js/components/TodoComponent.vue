<template>
    <div class="row col-md-12 justify-content-center">

        <div class="col-md-7 d-block">
            <input type="text" name="todo" class="w-100" placeholder="What needs to be done"
            v-model="newTodo" @keyup.enter="addTodo">

           <div v-for="(todo,index) in todos" :key="todo.id" class="d-flex justify-content-between">

                <div class="d-flex">
                    <input type="checkbox" v-model="todo.completed" @click="checkTodo(todo)">

                    <div class="pl-1" :class="{ completed : todo.completed }">{{todo.task}}</div>
                </div>

                <div class="pointer" @click="deleteTodo(todo,index)">
                    &times;
                </div>

            </div>

            <div class="border-top d-flex justify-content-between mt-2 pt-2">

                <div class="">
                    <input type="checkbox" :checked="!anyRemaining" @click="checkAll()">
                    <label for="checkbox" class="pl-1">Check all</label>
                </div>

                <div>
                    <p class=""> {{ remaining }} items left  </p>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {

        props: ['userId'],

        mounted() {
            this.getTodo()
        },

        name:'todo-list',
        data(){
            return{
                newTodo: '',
                todos: {}
            }
        },

        computed: {
            remaining() {
                return this.todos.filter(todo => !todo.completed).length
            },

            anyRemaining() {
                return this.remaining != 0
            }
        },

        methods:{
            addTodo() {

                if (this.newTodo.trim().length == 0) {
                    return
                }
                axios.post('/profile/' + this.userId + '/todo/'+ this.newTodo);

                this.getTodo();

                this.newTodo=''

            },

            deleteTodo(todo, index){
                this.todos.splice(index, 1)

                axios.delete('/profile/' + this.userId + '/todo/delete/' + todo.id);

                this.getTodo();
            },

            getTodo() {

                axios.get('/profile/' + this.userId + '/todo/get')
                    .then(response => {

                        this.todos = response.data;

                        for (let index = 0; index < this.todos.length; index++) {
                            if (this.todos[index].completed == 0){
                                this.todos[index].completed = false;
                                //alert(this.todos[index].completed)
                            } else if (this.todos[index].completed == 1) {
                                this.todos[index].completed = true;
                                //alert(this.todos[index].completed)
                            }
                        }

                    }
                )
            },

            checkTodo(todo){
                if (todo.completed == true ){
                    axios.patch('/profile/' + this.userId + '/todo/' + todo.id +'/0')
                } else {
                    axios.patch('/profile/' + this.userId + '/todo/' + todo.id +'/1')
                }
            },


            checkAll(){

                if (this.anyRemaining){
                    for (let index = 0; index < this.todos.length; index++) {
                        this.todos[index].completed = true;
                        axios.patch('/profile/' + this.userId + '/todo/' + this.todos[index].id +'/1')
                    }
                } else {
                    for (let index = 0; index < this.todos.length; index++) {
                        this.todos[index].completed = false;
                        axios.patch('/profile/' + this.userId + '/todo/' + this.todos[index].id +'/0')
                    }
                }

            }

        }
    }

</script>

<style>
    .pointer {
        cursor: pointer
    }

    .completed {
        text-decoration: line-through;
        color: gray;
    }
</style>
