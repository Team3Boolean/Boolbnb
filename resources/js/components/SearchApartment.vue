<template>
    <div>
        <div class="container">
            <h1>ciao dal filtro di ricerca</h1>
            <input type="text" v-model="this.address" @click="searchFilteredApartments()">
        </div>
    </div>  
</template>

<script>
    export default {
        name : "search-apartment",
        props : {
            
        },
       data() {
            return {
                allApartmentsArray: [],
                filteredApartmentsArray: [],
                address: "",
                //distance: 20,
                //gps_lat: "41.001520",
                //gps_lng: "16.796250",
                //beds: 1,
                //bathrooms: 1,
                //mq: 50,
                //rooms: 1,
                services: null, 
                // dati chiamate axios
                // Dati Api
                //apiKey: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                //apiSearch: '/api/apartments/searchFilteredApartments',
                //apiTomTom: 'https://api.tomtom.com/search/2/search/'
            };
        },
        mounted(){
            axios.get("/api/apartments")
            .then(resp => {
                this.allApartmentsArray = resp.data.results;
                console.log(this.allApartmentsArray);
            })
            //this.getFilteredApartments()           
        }, 
        methods: {
           getFilteredApartments() {
               axios.get("/api/apartments/searchFilteredApartments", {
                   params: {
                       //distance: this.distance,
                       //gps_lat: this.gps_lat,
                       //gps_lng: this.gps_lng,
                       //beds: this.beds,
                       //bathrooms: this.bathrooms,
                       //mq: this.mq,
                       //rooms: this.rooms
                       address: this.address
                   }
               })
               .then(resp => {
                   console.log(resp.data.results + " " + "risposta dalla funzione getfilteredapartment");
               })
           },
           nearApartments(lat, lon) {
               axios.get("/api/apartments/findNearestHouse")
               .then(resp => {
                   console.log(resp.data.results);
               })
           }
        }, 
    }
</script>
