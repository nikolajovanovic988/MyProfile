<template>
    <div class="row col-md-12 justify-content-center">

        <div class="col-md-7 d-block">

            <div class="d-flex justify-content-between align-items-center pb-3">
                <img src="/img/mglass/magnifying-glass.jpg" class="logo pr-2" alt="">
                <input type="text" name="todo" class="w-100" placeholder="Search">
                <button class="btn-success ml-3">Add</button>
            </div>


           <div v-for="(phonebook) in phonebooks" :key="phonebook.id" class="d-flex">

                <div class="d-flex w-50">
                    <div class="pl-1" >{{phonebook.name}}</div>
                </div>

                <div class="d-flex w-50 justify-content-between">
                    <p>show</p>
                    <p>edit</p>
                    <p>delete</p>
                </div>

            </div>

            <div class="border-top d-flex justify-content-between mt-2 pt-2">


            </div>

        </div>

    </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component mounted.')
        },

        name:'phonebook-list',
        data(){
            return{
                newPhonebook: '',
                phonebooks: [
                    {
                        'id' : 1,
                        'name' : 'nikola111111 111',
                        'phone' : '061111111',
                        'mail' : 'some@mail.com',
                    },
                    {
                        'id' : 2,
                        'name' : 'nikola2222222 2222',
                        'phone' : '062222222',
                        'mail' : 'some2@mail.com',
                    },
                    {
                        'id' : 3,
                        'name' : 'nikola33333 3333',
                        'phone' : '063333333',
                        'mail' : 'some3@mail.com',
                    },
                ]
            }
        },

        computed: {

        },

        methods:{


        }
    }

</script>

<style>

</style>
