<template>
    <div class="row col-md-12 justify-content-center">

        <div class="col-md-7 d-block">

            <div class="d-flex justify-content-between align-items-center pb-3">
                <img src="/img/mglass/magnifying-glass.jpg" class="logo pr-2" alt="">
                <input type="text" name="todo" class="w-100" placeholder="Search">

                <!-- Button trigger modal -->
                <button type="button" class="btn-success ml-3" data-toggle="modal" data-target="#set">
                  Add
                </button>

                <!-- Modal -->
                <div class="modal fade" id="set" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Friend</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">

                                <div class="row form-group">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Name:</label>
                                    <input id="name"
                                    type="text"
                                    class="form-control w-50"
                                    v-model="newPhonebook.name"
                                    autofocus>
                                </div>

                                <div class="row form-group">
                                    <label for="number" class="col-md-2 col-form-label text-md-right">Number:</label>
                                    <input id="number"
                                    type="text"
                                    class="form-control w-50"
                                    v-model="newPhonebook.number"
                                    autofocus>
                                </div>

                                <div class="row form-group">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">email:</label>
                                    <input id="email"
                                    type="text"
                                    class="form-control w-50"
                                    v-model="newPhonebook.email"
                                    autofocus>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" @click="addPhonebook" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


           <div v-for="(phonebook, index) in phonebooks" :key="phonebook.id" class="d-flex">

                <div class="d-flex w-50">
                    <div class="pl-1" >{{phonebook.name}}</div>
                </div>

                <div class="d-flex w-50 justify-content-between">
                    <div class="m-1">

                        <label class="pointer" for="show" data-toggle="modal" data-target="#show">show</label>
                        <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Friend</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row form-group">
                                            <label for="name" class="ml-3 col-form-label text-md-right">{{phonebook.name}}</label>
                                        </div>

                                        <div class="row form-group">
                                            <label for="number" class="ml-3 col-form-label text-md-right">{{phonebook.number}}</label>
                                        </div>

                                        <div class="row form-group">
                                            <label for="email" class="ml-3 col-form-label text-md-right">{{phonebook.email}}</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-1">
                        <label class="pointer" for="edit" data-toggle="modal" data-target="#edit">edit</label>
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Friend</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row form-group">
                                            <label for="name" class="col-md-2 col-form-label text-md-right">Name:</label>
                                            <input id="name"
                                            type="text"
                                            class="form-control w-50"
                                            v-model="newName"
                                            placeholder = "some"
                                            autofocus>
                                        </div>

                                        <div class="row form-group">
                                            <label for="number" class="col-md-2 col-form-label text-md-right">Number:</label>
                                            <input id="number"
                                            type="text"
                                            class="form-control w-50"
                                            v-model="newNumber"
                                            autofocus>
                                        </div>

                                        <div class="row form-group">
                                            <label for="email" class="col-md-2 col-form-label text-md-right">email:</label>
                                            <input id="email"
                                            type="text"
                                            class="form-control w-50"
                                            v-model="newEmail"
                                            autofocus>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" @click="addPhonebook" data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pointer m-1" @click="removePhonebook(phonebook,index)">
                        delete
                    </div>
                </div>

            </div>

            <div class="border-top d-flex justify-content-between mt-2 pt-2">


            </div>

        </div>

    </div>
</template>

<script>
    export default {

        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        name:'phonebook-list',
        data(){
            return{

                newName : '',
                newNumber : '',
                newEmail : '',

                newPhonebook: {
                    name : '',
                    number : '',
                    email : ''
                },

                phonebooks: this.getPhonebook(),

            }
        },

        computed: {

        },

        methods:{

            addPhonebook(){

                //this.newPhonebook.push({
                //    name: this.newName,
                //    phone: this.newPhone,
                //    mail: this.newMall,
//})

                axios.post('/profile/' + this.userId + '/phonebook/store/', this.newPhonebook)
                    .then(response => {
                        this.phonebooks = this. getPhonebook();
                    }
                )

            },

            removePhonebook(phonebook,index){

                this.phonebooks.splice(index,1)

                axios.delete('/profile/' + this.userId + '/phonebook/delete/' + phonebook.id)
                    .then(response => {

                        this.phonebooks = this. getPhonebook();

                    }
                )

            },

            getPhonebook() {

                axios.get('/profile/' + this.userId + '/phonebook/get')
                    .then(response => {

                        this.phonebooks = response.data;

                    }
                )
            },

        }
    }

</script>

<style>
    .pointer {
        cursor: pointer
    }
</style>
