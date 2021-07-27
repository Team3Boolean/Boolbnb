<template>
    <div class="container">
        <section class="jumbotron">
            <form >
                <!--@submit.prevent="filter()" @reset="onReset()"-->
                <search-apartment
                    v-model="filters.address"        
                ></search-apartment>
                <button type="submit">Filtra</button>
                <button type="reset">Annulla</button>
            </form>
            <!-- componente per ricerca appartamento--> 
        </section>

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
    /* methods: {
        filter() {
            axios.get("/api/apartments", {
                params: this.filters
            })
            .then(resp => {
                console.log(resp);
                this.filteredApartment = resp.data.results;
                console.log(this.filteredApartment);
                //this.$emit("filters", resp.data);
            })
            .catch(er => {
                console.error(er);
                alert('Errore nel caricamento dei dati');
            })
        },
        onReset() {
           this.filteredApartment = this.apartmentList;
        }
    }, */
}
</script>