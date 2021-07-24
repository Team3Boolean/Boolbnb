<template>
    <div>
        <input type="search" id="query" name="indirizzo" class="form-control"  placeholder="Dove vuoi andare?" value="">
        <button @click="search()">SEARCH</button>
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
        /* mounted(){
            axios.get("/api/apartments")
            .then(resp => {
                this.allApartments = resp.data.results;
                console.log(this.allApartments);
            })            
        }, */
        methods: {
            handleResults: function(result) {
                console.log(result);
                if(result.results) {
                    let position = result.results[0].position;
                    this.latitude = position.lat;
                    this.longitude = position.lng;
                    console.log(this.latitude, this.longitude);
                }
            },

            search() {
                tt.services.fuzzySearch({
                    key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                    query: document.getElementById("query").value,
                }).then(this.handleResults);

                //dopo aver preso i dati svuopo il campo input di ricerca
                document.getElementById("query").value = "";
            }, 
        },
    }
</script>