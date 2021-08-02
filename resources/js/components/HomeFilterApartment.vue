<template>
    <div class="container">
        
            <!-- <div class="title-label blue-label"> -->

            <!-- </div> -->
            <form @submit.prevent="filter()" @reset="onReset()">
                
                <search-apartment
                placeholder="Dove vuoi andare?"
                v-model="filters.address"        
                ></search-apartment>

                <filter-input
                placeholder="camere"
                type="number"
                v-model="filters.rooms"
                ></filter-input>

                <filter-input
                placeholder="letti"
                type="number"
                v-model="filters.beds"
                ></filter-input>

                <check-input
                :items="serviceList"
                v-model="filters.services"
                ></check-input>

                <!-- <range-input
                label= "seleziona la distanza"
                v-model="filters.range"
                ></range-input> -->

                
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
            filters: {
                //metto valore di default null 
                //cosi' axios non inserisce il campo nella query se non e' compilato
                address: null,
                rooms: null,
                beds: null,
                //range: 20,
                services: []
            },
            serviceList: []
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
            });
        
        axios.get("/api/services")
              .then(resp => {
                  this.serviceList = resp.data.results;
              })
              .catch(er => {
                  cosole.error(er);
              })
    },
    methods: {
        filter() {
            axios.get("/api/apartments/filter", {
                //passo come query string i miei filtri
                params: this.filters
            })
            .then(resp => {
                console.log(resp.data.results);
                this.filteredApartment = resp.data.results;
                console.log("messaggio dal then della funzione filter");
            })
            .catch(er => {
                console.error(er);
                alert('Errore nel caricamento dei dati');
            })
        },
        onReset() {
            //reset dei filtri
            this.filters.address = null,
            this.filters.rooms = null,
            this.filters.beds = null,
            this.filters.services = null,
            this.filteredApartment = this.apartmentList;
        },
        /* getPosition() {
            axios.get("/api/apartments/radialSearch", {
                params: this.filters
            })
            .then(resp => {
                console.log(resp.data.results)
            })
            .catch(er => {
                console.error(er);
                alert('Errore nel caricamento dei dati')
            })
        } */
    }, 
}
</script>