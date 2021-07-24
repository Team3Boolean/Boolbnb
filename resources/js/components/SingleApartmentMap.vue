<template>
    <div :id="getMap()" style="width: 80vw; height: 80vh;">Benvenuti nelle mappa TomTom!!!</div>
</template>

<script>
export default {
    name : "single-apartment-map",
    props: {},
    data() {
        return {
            /* map: tt.map({
                key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                container: "map",
                zoom: 5,
                center: [12.4818, 41.9109],
            }), */
        }
    },
    methods: {
        getMap(){
            tt.map({
                key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
                container: "map",
                zoom: 5,
                center: [12.4818, 41.9109],
            })
        }
    },
}
</script>