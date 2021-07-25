<template>
    <div>
        <div class="form-group">
            <form action="" method="POST" @submit.prevent="submit">
                <div class="alert alert-success" v-show="success" >
                    <div class="row">
                        <div class="col-8">
                        messaggio inviato correttamento
                        </div>

                        <div class="col-4" @click="unsetSuccess"> 
                            <span class="btn-close">close</span>                     
                        </div>

                    </div>

                </div>
                <!-- your email -->
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" v-model="fields.email">
                <div class="alert alert-danger" v-if="errors && errors.email">
                    {{errors.email[0]}}
                </div>
                <!-- text -->
                <label for="text">Messaggio:</label>
                <textarea type="text" name="text" id="text" class="form-control" rows="10" v-model="fields.text"></textarea> 
                <div class="alert alert-danger" v-if="errors && errors.text">
                    {{errors.text[0]}}
                </div> 
                <input type="text" name="apartment_id" id="apartment_id" class="form-control" v-model="fields.apartment_id">             
                <input  class="btn btn-primary" type="submit" value="save">
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SendMessage',
    props: {
        
    },
    data(){
        return{
            
            messages : null,
            success: false,
            errors : {},
            fields : {},
        }
       
    },
    mounted() {
            // axios.get('/api/messages')
            // .then(resp =>{
            //     this.messages = resp.data.results;
            // });
            axios.get('/api/apartments')
            .then(resp =>{
                this.apartments = resp.data.results;
            })

            //come fare a recuperare user da auth? La chiamata è settata già con Middleware
            // axios.get('/api/users')
            // .then(resp =>{
            //     this.users = resp.data.results;
            // })
    },
    methods: {
        //metodo post per popolare oggetto legato a v-model
        submit(){
            axios.post('/api/messages', this.fields)
            .then(resp=> {
                this.fields = {};
                this.success = true;
                this.errors = {};
            })
            .catch(error=> {
                if(error){
                    this.errors = error.response.data.errors;
                }
                console.log('Errore in invio messaggio');
            });
        },
        unsetSuccess(){
            this.success = false;
        }
    }
}
</script>