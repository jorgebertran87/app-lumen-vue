<template>
    <div style="width: 100%">
        <Pagination
                :rows="rows"
                :perPage="perPage"
                :currentPage.sync="currentPage"
        />
        <ManagersSelector
                :managers="options"
                :selected.sync="selected"
        />
        <DatePicker
                :date.sync="date"
        />
        <Employees
                :items="items"
                :onItemSelected="fetchItem"
                :itemSelected="itemSelected"
        />
    </div>

</template>

<script>
    import axios from "axios";
    import Pagination from './Pagination.vue';
    import ManagersSelector from './ManagersSelector.vue';
    import DatePicker from './DatePicker.vue';
    import Employees from './Employees.vue';

    export default {
        name: 'List',
        components: {
            Pagination,
            ManagersSelector,
            DatePicker,
            Employees
        },
        data () {
            return {
                rows: 0,
                perPage: 20,
                date: '2019-01-01',
                options: [ ],
                currentPage: 1,
                selected: '',
                items: [],
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
            this.fetchItems(1);
            this.fetchManagers();
        },
        watch: {
            currentPage(newParam) {
                this.fetchItems(newParam);
            },
            date() {
                this.fetchItems(1);
            },
            selected() {
                this.fetchItems(1);
            }
        }
    }
</script>
