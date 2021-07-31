<template>
    <div>
      
        <div class="form-group d-flex-col">
        <!-- <input type="search" id="" name="indirizzo" class="form-control"  placeholder="Dove vuoi andare?">
        <input type="hidden" id="lat" :value="latitude" name="lat" class="form-control" >
        <input type="hidden" id="lng" :value="longitude" name="lng" class="form-control"> -->
            <input
                :placeholder="placeholder"
                :type="inputType"
                :value="value"
                @input="$emit('input', $event.currentTarget.value)"
                class="input-basic"
            >   
        </div>
    </div>
    
</template>

<script>
    export default {
        name : "search-apartment",
        props : {
            label: String,
            value: String,
            inputType: {
                type: String,
                default: "text",
            },
            placeholder: String,
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
        mounted() {
            axios.get("/api/apartments").then((resp) => {
            this.allApartments = resp.data.results;
            console.log(this.allApartments);
            });
        },
    methods: {
       /*  searchApartments() {
            var options = {
                searchOptions: {
                    key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                    language: "it-IT",
                    limit: 10,
                    //radius: 2000
                },
                autocompleteOptions: {
                    key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                    lamguage: "it-IT",
                    countrySet: "IT",
                    limit: 5,
                    entiyTypeSet: "Municipality"
                }
            },

            ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
            searchBoxHTML = ttSearchBox.getSearchBoxHTML();
                document.body.appendChild(searchBoxHTML);
                ttSearchBox.on('tomtom.searchbox.resultselected', handleResultSelection);
                ttSearchBox.on('tomtom.searchbox.resultselected', function (data) {
                    var position = data['data']['result']['position'];
                    console.log(position);
                    var latitudine = position['lat'];
                    var longitudine = position['lng'];
                    console.log(latitudine, longitudine);
                });            
        },

        handleResults (result) {
            console.log(result);
            var position = result.results[0].position;
            console.log(position);
            var latitudine = position['lat'];
            var longitudine = position['lng'];
            console.log(latitudine);
            console.log(longitudine);
        },

       search() {
            
            tt.services.fuzzySearch({
            key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
            language: "it-IT",
                //20km - richiesto in metri
            radius:2000,
            query: document.getElementById("query").value,
            }).then(this.handleResults);
        },
       */

    },
        
       
         
    }
</script>
