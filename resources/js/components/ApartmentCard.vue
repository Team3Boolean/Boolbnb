<template>
    <div>
        <div class="card">
            <img class="card-img-top" :src="coverUrl" style="width: 100%; height: 225px;" alt="casa">
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p>{{ price }} &euro;/notte</p>
            </div>
            <div class="card-footer blue-bg">
                <a :href="link">Vai ai dettagli...</a>
            </div>
        </div>  
    </div>
    <!-- {{ route('apartments.show', $apartment->id) }} -->
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
        price: Number,
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