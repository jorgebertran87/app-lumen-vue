<template>
    <div>
        <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                aria-controls="employees"
        ></b-pagination>
        <b-table
                id="employees"
                responsive
                striped
                bordered
                :items="fetchItems"
                :busy.sync="isBusy"
                :per-page="perPage"
                :current-page="currentPage">

        </b-table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: 'List',
        data () {
            return {
                isBusy: false,
                rows: 0,
                perPage: 20,
                currentPage: 1
            }
        },
        methods: {
            fetchItems(ctx) {
                const self = this;
                let promise = axios.get('http://0.0.0.0/employees?page=' + ctx.currentPage + '&rows=' + ctx.perPage);

                return promise.then((response) => {
                    self.rows = response.data.rows;
                    return response.data.data;
                });
            }
        }
    }
</script>
