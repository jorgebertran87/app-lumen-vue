<template>
    <b-form-input
            id="date"
            v-model="date"
            type="date"
            size="sm"
            class="float-sm-left w-25"
    >

    </b-form-input>
</template>

<script>
    export default {
        name: 'DatePicker',
        data() {
            return {
                date: '2019-01-01'
            }
        },
        props: {
            managers: { type: Array }
        },
        watch: {
            date(newValue) {
                this.$emit('update:date', newValue);
            }
        }
    }

</script>
