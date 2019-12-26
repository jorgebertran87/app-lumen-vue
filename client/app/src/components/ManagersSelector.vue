<template>
    <b-form-select
            id="managers"
            size="sm"
            class="float-sm-left w-25 mr-4"
            v-model="selected"
            :options="managers"
    >

    </b-form-select>
</template>

<script>
    export default {
        name: 'ManagersSelector',
        data() {
            return {
                selected: ''
            }
        },
        props: {
            managers: { type: Array }
        },
        watch: {
            selected(newValue) {
                this.$emit('update:selected', newValue);
            }
        }
    }

</script>
