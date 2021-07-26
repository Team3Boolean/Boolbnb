<template>
    <div>
        <h2>{{ id }}</h2>
        <h3>{{ title }}</h3>
        <p>{{ description }}</p>
        <a :href="link">Vai ai dettagli...</a>
        <!-- {{ route('apartments.show', $apartment->id) }} -->
    </div>    
</template>

<script>
export default {
    name: "ApartmentCard",
    props: {
        id: Number,
        title: String,
        description: String,
        link: String,
        coverUrl: String,

    },
    computed: {
        /* imgSrc() {
            const defaultImg = "";
            src="mettere qui tutto src"
            return this.coverUrl ? ("storage/" + this.coverUrl) : defaultImg
        }  */
    }
}
</script>