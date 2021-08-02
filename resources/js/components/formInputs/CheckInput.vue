<template>
    <div>
        <div v-for="item in items" :key="item.id">
            <label>
                <input 
                    type="checkbox"
                    :value="item.id"
                    @change="onChange"
                />
                {{ item.name }}
            </label>
        </div>
    </div>
</template>

<script>
export default {
    name: "check-input",
    props: {
        //elementi che posso selezionare
        items: {
            type: Array,
            required: true
        },
        value: Array
    },
    data() {
        return {
            selectedItems: []
        }
    },
    methods: {
        onChange(ev) {
            // al change ascolto l'evento checked del target
            let checked = ev.target.checked;
            // faccio una condizione dove se il campo e' checked lo considero se no lo elimino dall array dei servizi da filtrare
            if (checked) {
                this.selectedItems.push(ev.target.value);
            } else {
                // in caso di cancellazione della spunta
                // vado a prendere l indice del servizio tolto e lo rimuovo dall'array
                const index = this.selectedItems.indexOf(ev.target.value);

                this.selectedItems.splice(index, 1);
            }

            this.$emit("input", this.selectedItems);
        }
    }
}
</script>