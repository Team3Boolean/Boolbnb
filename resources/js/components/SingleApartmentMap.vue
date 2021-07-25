<template>
    <div>
        <p>Benvenuti nelle mappa TomTom!!!</p>
        <div :id="map" v-on="getMap()" style="width: 350px; height: 250px;"></div>
    </div>
</template>

<script>
export default {
    name : "single-apartment-map",
    props: {},
    data() {
        return {
            map: tt.map({
                key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                container: "map",
                zoom: 14,
                center: [12.4818, 41.9109],
            }),
        }
    },
    methods: {
        getMap(){
            tt.map({
                key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                container: "map",
                zoom: 14,
                center: [12.4818, 41.9109],
            })
        }
    },
}
</script>