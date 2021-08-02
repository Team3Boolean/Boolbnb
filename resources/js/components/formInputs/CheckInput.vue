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
        onChange(event) {
            const selected =  event.target.value;
            console.log(event);

            if(selected) {
                this.selectedItems.push(event.target.value);
            } else {
                const indexToDelete = this.selectedItems.indexOf(event.target.value);

                this.selectedItems.splice(indexToDelete, 1);
            }

            this.$emit("input", this.selectedItems);
        }
    }
}
</script>