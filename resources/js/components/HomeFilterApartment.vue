<template>
    <div>
        <div class="jumbotron bg-jumbotron">
            <div class="container">
                <form @submit.prevent="filter()" @reset="onReset()">
                    <search-apartment
                        placeholder="Dove vuoi andare?"
                        v-model="filters.address"
                    ></search-apartment>
                    <button class="btn-primary" type="submit">Viaggia</button>

                    <div v-if="!showAdvancedFilters" @click="advancedFilters()" style="color: white; cursor: pointer;">Filtri avanzati</div>
                    <div v-show="showAdvancedFilters">
                        <filter-input
                            placeholder="camere"
                            type="number"
                            min="1"
                            v-model="filters.rooms"
                        ></filter-input>

                        <filter-input
                            placeholder="letti"
                            type="number"
                            min="1"
                            v-model="filters.beds"
                        ></filter-input>

                        <div v-for="service in serviceList" :key="service.id">
                            <label for="service.name">
                                {{ service.name }}
                                <input
                                    type="checkbox"
                                    v-model="filters.services"
                                    :value="service.id"
                                    :name="service.name"
                                    :id="service.name"
                                />
                            </label>
                        </div>

                        <div>
                            <label for="distance">Distanza massima</label>
                            <input
                                type="range"
                                id="ditance"
                                name="distance"
                                min="5"
                                max="50"
                                step="1"
                                list="tickmarks"
                                v-model="filters.distance"
                            />

                            <datalist id="tickmarks">
                                <option value="0"></option>
                                <option value="5"></option>
                                <option value="10"></option>
                                <option value="15"></option>
                                <option value="20"></option>
                                <option value="25"></option>
                                <option value="30"></option>
                                <option value="35"></option>
                                <option value="40"></option>
                                <option value="45"></option>
                                <option value="50"></option>
                            </datalist>
                        </div>

                        <div class="d-flex f-end">
                            <button class="btn-primary" @click="filter()">Filtra</button>
                            <button class="btn-primary" type="reset">Annulla</button>
                        </div>
                        <div v-if="showAdvancedFilters" @click="advancedFilters()" style="cursor: pointer;">Chiudi filtri avanzati</div>
                    </div>    
                </form>
            </div>
        </div>

        <div class="container">
            <div v-if="showSponsorized" class="row all-pd">
                <div v-for="apartment in sponsorizedApartments" :key="apartment.id">
                    <apartment-card
                        :coverUrl="apartment.img_cover"
                        :title="apartment.title"
                        :link="apartment.link"
                        :price="apartment.price"
                    ></apartment-card>

                    <div v-for="sponsorshipStatus in apartment.sponsorships" :key="sponsorshipStatus.id">
                        {{sponsorshipStatus.name}}
                    </div>
                </div>
            </div>

            <div v-else-if="showFiltered" class="row all-pd">
                <div v-for="apartment in filteredApartment" :key="apartment.id">
                    <apartment-card
                        :title="apartment.title"
                        :price="apartment.price"
                        :link="apartment.link"
                        :coverUrl="apartment.img_cover"
                    ></apartment-card>

                    <div v-for="sponsorshipStatus in apartment.sponsorships" :key="sponsorshipStatus.id">
                        {{sponsorshipStatus.name}}
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div id="map" style="width: 500px; height: 400px;"></div>
        </div> -->
    </div>
</template>

<script>
import ApartmentCard from './ApartmentCard.vue';
export default {
  components: { ApartmentCard },
    name: "HomeFilterApartment",
    data() {
        return {
            apartmentList: [],
            filteredApartment: [],
            sponsorizedApartments: [],
            filters: {
                //metto valore di default null
                //cosi' axios non inserisce il campo nella query se non e' compilato
                address: null,
                rooms: null,
                beds: null,
                distance: "20",
                services: []
            },
            serviceList: [],
            showSponsorized: true,
            showFiltered: false,
            showAdvancedFilters: false,
            searchPlaceLat: null,
            searchPlaceLng: null,
        };
    },
    methods: {
        filter() {
            axios
                .get("/api/apartments/filter", {
                    //passo come query string i miei filtri
                    params: this.filters
                })
                .then(resp => {
                    this.filteredApartment = resp.data.results;
                    // quando attivo il filtro cambio il vaolre della variabile show
                    // cosi da mostrare il div che voglio
                    this.showSponsorized = false;
                    this.showFiltered = true;
                    this.searchedPosition = resp.data.position;
                    this.searchPlaceLat = this.searchedPosition['lat'];
                    this.searchPlaceLng = this.searchedPosition['lng'];
                    var apartmentLat = this.filteredApartment[0]["gps_lat"];

                    console.log(apartmentLat + "latitudine primo appartamento lista appartamenti filtrati");

                    console.log(this.searchPlaceLat, this.searchPlaceLng);
                })
                .catch(er => {
                    console.error(er);
                    alert("Errore nel caricamento dei dati");
                });
        },

        onReset() {
            //reset dei filtri
            this.filters.address = null,
            this.filters.rooms = null,
            this.filters.beds = null,
            this.filters.services = [],
            this.filters.distance = "20",
            this.showFiltered = false,
            this.showSponsorized = true,
            this.filteredApartment = this.apartmentList;
        },

        createMap() {
            //recupero la posizione del centro della mappa
            var position = [this.searchPlaceLng, this.searchPlaceLat];
            const APIKEY = 'rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ';
            
            var map = tt.map({
                key: APIKEY,
                container: 'map',
                center: position,
                zoom: 5,
                //basePath: 'sdk/',
                theme: {
                    style: 'main',
                    layer: 'basic',
                    source: 'vector'
                }
            
            });

            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            var marker = new tt.Marker({
                draggable: false
            }).setLngLat(position).addTo(map);

            this.getApartmentsPos().forEach(position => {
                //console.log(position);
                new tt.Marker().setLngLat(position).addTo(map);
            });
        },

        getApartmentsPos() {
            var houses = this.filteredApartment;

            var apartmentsPosition = [];

            for (var i = 0; i < houses.length; i++) {
                var singleApartmentLat = houses[i]['gps_lat'];
                var singleApartmentLng = houses[i]['gps_lng'];

                console.log([singleApartmentLng, singleApartmentLat]);
                apartmentsPosition.push([singleApartmentLng, singleApartmentLat]);    
            }

            return apartmentsPosition;

        },

        showMap() {
            setTimeout(()=>this.createMap(), 10000);
        },

        getSponsorized(list) {
            var sponsorizedApartments = [];

            for(var i = 0; i < list.length; i++) {

                var sponsorizedApartment = list[i];
                
                if(sponsorizedApartment.sponsorships.length > 0) {
                    sponsorizedApartments.push(sponsorizedApartment);
                }
            }
            return sponsorizedApartments;    
        },

        advancedFilters() {
            this.showAdvancedFilters = !this.showAdvancedFilters;
        },
    },    
    mounted() {
        axios
            .get("/api/apartments")
            .then(resp => {
                console.log(resp.data.results);
                this.apartmentList = resp.data.results;                
                this.filteredApartment = resp.data.results;
                this.sponsorizedApartments = this.getSponsorized(this.apartmentList);
            })
            .catch(er => {
                alert("Impossibile recuperare l'elenco degli appartamenti");
            });

        axios
            .get("/api/services")
            .then(resp => {
                this.serviceList = resp.data.results;
            })
            .catch(er => {
                cosole.error(er);
            });
    },
};
</script>