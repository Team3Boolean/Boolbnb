<template>
    <div>
        <form action="./api/messages" v-on:submit.prevent="submitForm()">
            <input type="date" v-model="date" id="date">
            <br>
            <input type="email" v-model="email" id="email">
            <br>
            <input type="text" placeholder="finto ip di prova" v-model="ip" id="ip">
            <br>
            <textarea v-model="text" name="text" id="text" cols="30" rows="1"></textarea>
            
            <button type="submit">Invia</button>
        </form>
    </div>
</template>

 

<script>
export default {
    name: "message-box",
    props: {

    },
    data() {
        return {
        
            email: "",
            text: "",
            date: "",
            ip: "",
        }
    },
    methods: {
        submitForm(){
            axios.post('/api/messages', {
                email: this.email,
                text: this.text,
                date: this.date,
                ip: this.ip
            }).then(resp => {
                console.log(resp.data);
            })
        }
    }

}
</script>