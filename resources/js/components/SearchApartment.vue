<template>

    <div>
        <input type="search" id="" name="indirizzo" class="form-control"  placeholder="Dove vuoi andare?">
        <input type="hidden" id="lat" :value="latitude" name="lat" class="form-control" >
        <input type="hidden" id="lng" :value="longitude" name="lng" class="form-control">
        
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
                longitude: ""
            };
        },
        mounted(){
            axios.get("/api/apartments")
            .then(resp => {
                this.allApartments = resp.data.results;
                console.log(this.allApartments);
            })            
        }
    }
</script>
