<template>
    <div>
        <div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" :src="coverUrl" alt="casa">
                    <div class="card-body">
                        <h3 class="card-title">{{ title }}</h3>
                        <p>{{ price }} &euro;/notte</p>
                    </div>
                    <div class="card-footer blue-bg">
                        <a :href="link">Vai ai dettagli...</a>
                    </div>
                </div>
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