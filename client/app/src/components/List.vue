<template>
    <div style="width: 100%">
        <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                class="float-sm-left mr-4 ml-4"
                size="sm"
                aria-controls="employees"
        ></b-pagination>
        <b-form-select
                size="sm"
                class="float-sm-left w-25 mr-4"
                v-model="selected"
                :options="options"
        >

        </b-form-select>
        <b-form-input
                v-model="date"
                type="date"
                size="sm"
                class="float-sm-left w-25"
        >

        </b-form-input>
        <b-table
                id="employees"
                responsive
                striped
                bordered
                :items="items"
                :busy.sync="isBusy"
                :per-page="perPage"
        >

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
                currentPage: 1,
                date: '2019-01-01',
                options: [ ],
                selected: '',
                items: [],
                numRequests: 0
            }
        },
        methods: {
            fetchItems() {
                let url = 'http://0.0.0.0/employees?page=' + this.currentPage + '&rows=' + this.perPage;

                if (this.selected && this.date) {
                    url += '&mid=' + this.selected + '&date=' + this.date;
                }

                const self = this;
                let promise = axios.get(url);

                return promise.then((response) => {
                    self.rows = response.data.rows;
                    self.items = response.data.data;
                });
            },
            fetchManagers() {
                this.options = [
                    {text: 'Select a manager', value: ''}
                ];

                let promise = axios.get('http://0.0.0.0/managers');
                return promise.then((response) => {
                    const managers = response.data;
                    managers.forEach( manager => {
                        this.options.push({text: manager.firstName + ' ' + manager.lastName, value: manager.id});
                    });
                });

            }
        },
        mounted() {
            this.fetchItems();
            this.fetchManagers();
        },
        watch: {
            currentPage() {
                this.fetchItems();
            },
            selected() {
                this.currentPage = 1;
                this.fetchItems(1);

            },
            date() {
                this.currentPage = 1;
                this.fetchItems(1);
            }
        }
    }
</script>
