<template>
    <div>
        <div class="form-group d-flex-col">
            <label>
                <br>
                {{label}}
                <input
                    :placeholder="placeholder"
                    :type= inputType
                    :value= 20
                    :max= 50
                    :min= 5
                    :step= 5
                    @input="$emit('input', $event.currentTarget.value)"
                    class="input-basic"
                >
            </label>       
        </div>
    </div>
</template>

<script>
export default {
    name: "range-input",
    props : {
        label: String,
        value: Number,
        inputType: {
            type: Number,
            default: "range",
        },
        placeholder: String,
        max: Number,
        min: Number,
        step: Number,
    },
}
</script>