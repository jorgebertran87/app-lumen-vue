<template>
    <div style="width: 100%">
        <Pagination
                :rows="rows"
                :perPage="perPage"
                :onChangePage="fetchItems"
        />
        <b-form-select
                id="managers"
                size="sm"
                class="float-sm-left w-25 mr-4"
                v-model="selected"
                :options="options"
        >

        </b-form-select>
        <b-form-input
                id="date"
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
            <template v-slot:cell(id)="row">
                <div @click="fetchItem(row.item.id)" style="cursor: pointer" v-b-modal="'modal-' + row.item.id">{{row.item.id}}</div>
                <b-modal  hide-footer :id="'modal-' + row.item.id" :title="'Employee Details for ' + itemSelected.firstName + ' ' + itemSelected.lastName">
                    <b-table
                            id="departments"
                            responsive
                            striped
                            bordered
                            :items="itemSelected.departments"
                    >
                    </b-table>
                    <b-table
                            id="salaries"
                            responsive
                            striped
                            bordered
                            :items="itemSelected.salaries"
                    >
                    </b-table>
                    <b-table
                            id="titles"
                            responsive
                            striped
                            bordered
                            :items="itemSelected.titles"
                    >
                    </b-table>
                </b-modal>
            </template>

            <template v-slot:row-details="row">

            </template>

        </b-table>
        <div>



        </div>
    </div>

</template>

<script>
    import axios from "axios";
    import Pagination from './Pagination.vue'

    export default {
        name: 'List',
        components: {
            Pagination
        },
        data () {
            return {
                isBusy: false,
                rows: 0,
                perPage: 20,
                date: '2019-01-01',
                options: [ ],
                selected: '',
                items: [],
                numRequests: 0,
                itemSelected: {}
            }
        },
        methods: {
            fetchItem(id) {
                let url = 'http://0.0.0.0/employees/' + id;

                const self = this;
                let promise = axios.get(url);

                return promise.then((response) => {
                    const item = response.data;
                    item.salaries.forEach(salary => {
                        salary.salary += ' €';
                    });

                    self.itemSelected = item;
                });
            },
            fetchItems(currentPage) {
                let url = 'http://0.0.0.0/employees?page=' + currentPage + '&rows=' + this.perPage;

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
            selected() {
                this.fetchItems(1);

            },
            date() {
                this.fetchItems(1);
            }
        }
    }
</script>
