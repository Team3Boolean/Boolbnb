<template>
    <div>
        <div class="form-group">
            <form action="" method="post">
                <!-- your email -->
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" v-model="fields.email">
                <!-- text -->
                <label for="text">Messaggio:</label>
                <textarea type="text" name="text" id="text" class="form-control" rows="10" v-model="fields.text"></textarea>  
                <input type="hidden" name="apartment_id" id="apartment_id" class="form-control" v-model="fields.apartment_id">             
                <input  class="btn btn-primary" type="submit" value="salva">
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
            users : null,
            messages : null,
            fields : {},
        }
       
    },
    mounted() {
            axios.get('/api/messages')
            .then(resp =>{
                this.messages = resp.data.results;
            });
            axios.get('/api/apartments')
            .then(resp =>{
                this.apartmentss = resp.data.results;
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
            axios.post('api/messages', this.fields)
            .then(resp=> {
                this.fields = {};
            })
            .catch(error=> {
                console.log('Errore in invio messaggio');
            });
        }
    }
}
</script>