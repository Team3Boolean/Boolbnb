<template>
    <div>
        <h3>{{ title }}</h3>
        <p>{{ description }}</p>
        <a :href="link">Vai ai dettagli...</a>
        <!-- {{ route('apartments.show', $apartment->id) }} -->
        <p>{{ sponsorships}}</p>
    </div>    
</template>

<script>
export default {
    name: "ApartmentCard",
    props: {
        id: String,
        title: String,
        description: String,
        link: String,
        coverUrl: String,
        sponsorships: String
    },
    computed: {
        imgSrc() {
            const defaultImg = "";
            src="mettere qui tutto src"
            return this.coverUrl ? ("storage/" + this.coverUrl) : defaultImg
        }
    }
}
</script>