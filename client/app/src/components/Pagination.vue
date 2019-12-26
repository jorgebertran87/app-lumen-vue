<template>
    <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            class="float-sm-left mr-4 ml-4"
            size="sm"
            aria-controls="employees"
    ></b-pagination>
</template>

<script>
    export default {
        name: 'Pagination',
        data () {
            return {
                currentPage: 1
            }
        },
        props: {
            rows: { type: Number },
            perPage: {type: Number },
            onChangePage: { type: Function }
        },
        watch: {
            currentPage() {
                this.onChangePage(this.currentPage);
            }
        }
    }
</script>
