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
                                    v-model="newName"
                                    autofocus>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="number" class="col-md-2 col-form-label text-md-right">Number:</label>
                                    <input id="number"
                                    type="text"
                                    class="form-control w-50"
                                    v-model="newPhone"
                                    autofocus>
                                </div>

                                <div class="row form-group">
                                    <label for="mail" class="col-md-2 col-form-label text-md-right">Mail:</label>
                                    <input id="mail"
                                    type="text"
                                    class="form-control w-50"
                                    v-model="newMall"
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
                                            <label for="number" class="ml-3 col-form-label text-md-right">{{phonebook.phone}}</label>
                                        </div>

                                        <div class="row form-group">
                                            <label for="mail" class="ml-3 col-form-label text-md-right">{{phonebook.mail}}</label>
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
                                            v-model="newPhone"
                                            autofocus>
                                        </div>

                                        <div class="row form-group">
                                            <label for="mail" class="col-md-2 col-form-label text-md-right">Mail:</label>
                                            <input id="mail"
                                            type="text"
                                            class="form-control w-50"
                                            v-model="newMall"
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

        mounted() {
            console.log('Component mounted.')
        },

        name:'phonebook-list',
        data(){
            return{
                newName: '',
                newPhone: '',
                newMall: '',
                idForPhonebook: 3,
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

            addPhonebook(){
                
                this.phonebooks.push({
                    id: this.idForPhonebook,
                    name: this.newName,
                    phone: this.newPhone,
                    mail: this.newMall,
                })

            },

            removePhonebook(phonebook,index){
                this.phonebooks.splice(index,1)
            }

        }
    }

</script>

<style>
    .pointer {
        cursor: pointer
    }
</style>
