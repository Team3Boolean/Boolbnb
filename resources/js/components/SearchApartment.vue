<template>

    <div>
        <!-- <input type="search" id="" name="indirizzo" class="form-control"  placeholder="Dove vuoi andare?">
        <input type="hidden" id="lat" :value="latitude" name="lat" class="form-control" >
        <input type="hidden" id="lng" :value="longitude" name="lng" class="form-control"> -->
        <form @submit.prevent="onSubmit()">
            <input type="text" v-model="userInput">
            <button type="submit">Filtra</button>
        </form>
    </div>
</template>

<script>
    export default {
        name : "search-apartment",
        props : {

        },
       data() {
            return {
                allApartments: [],
                searchedApartment:[],
                latitude: "",
                longitude: "",
                userInput: ""
            };
        },
        mounted(){
            axios.get("/api/apartments")
            .then(resp => {
                this.allApartments = resp.data.results;
                console.log(this.allApartments);
            })            
        },
        methods: {
            onSubmit(){
                axios.get("/api/apartments/filter", {
                    params: {
                        address: this.userInput
                    }
                }).then(resp => {
                    console.log(resp);
                })
            }
        },
    }
</script>
