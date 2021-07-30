<template>
    <div class="container">
        
            <!-- <div class="title-label blue-label"> -->

            <!-- </div> -->
            <form @submit.prevent="filter()" @reset="onReset()">
                
                <search-apartment
                v-model="filters.address"        
                ></search-apartment>
           
                <!--@submit.prevent="filter()" @reset="onReset()"-->
                <div class="d-flex f-end">
                    <button class="btn-primary" type="submit">Filtra</button>
                    <button class="btn-primary" type="reset">Annulla</button>
                </div> 
            </form>
            <!-- componente per ricerca appartamento--> 


        <section>
            <apartment-card v-for="apartment in filteredApartment" :key="apartment.id"
                :id="apartment.id"
                :title="apartment.title"
                :description="apartment.description"
                :link="apartment.link"
            ></apartment-card>
        </section>
    </div>
</template>

<script>
export default {
    name: "HomepageApartment",
    data() {
        return {
            apartmentList: [],
            filteredApartment: [],
            address: '',
            filters: {
                address: "",
                services: null
            }
        }
    },
    mounted() {
        axios.get("/api/apartments")
            .then(resp => {
                console.log(resp.data.results);
                this.apartmentList = resp.data.results;
                this.filteredApartment = resp.data.results;
            })
            .catch(er => {
                alert("Impossibile recuperare l'elenco degli appartamenti");
            })
    },
    methods: {
        filter() {
            axios.get("/api/apartments/filter", {
                params: this.filters
            })
            .then(resp => {
                console.log(resp.data.results);
                this.filteredApartment = resp.data.results;
                console.log("messaggio dal then della funzione filter");
                //this.$emit("filters", resp.data);
            })
            .catch(er => {
                console.error(er);
                alert('Errore nel caricamento dei dati');
            })
        },
        onReset() {
           this.filteredApartment = this.apartmentList;
        },
        /* getPosition() {
            axios.get("http://api.tomtom.com/search/2/geocode/" + this.address + ".json", {
                key: "",
                limit: 1
            })
            .then(resp => {
                console.log(resp.data.results.position);
            })
        } */
    }, 
}
</script>