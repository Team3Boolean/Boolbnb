<template>
    <div>
        <div class="form-group d-flex-col">
            <input
                :placeholder="placeholder"
                :type="inputType"
                :value="value"
                @input="$emit('input', $event.currentTarget.value)"
                class="input-basic"
            >   
        </div>
    </div>
</template>

<script>
export default {
    name : "filter-input",
    props : {
        label: String,
        value: String,
        inputType: {
            type: String,
            default: "number",
        },
        placeholder: String,
    },
}
</script>