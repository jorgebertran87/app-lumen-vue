<template>
    <div>
        <div @click="onItemSelected(item.id)" style="cursor: pointer" v-b-modal="'modal-' + item.id">{{item.id}}</div>
        <b-modal  hide-footer :id="'modal-' + item.id" :title="'Employee Details for ' + itemSelected.firstName + ' ' + itemSelected.lastName">
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
    </div>
</template>

<script>
    export default {
        name: 'EmployeeDetail',
        data() {
            return {
                isBusy: false,
            }
        },
        props: {
            item: { type: Object },
            itemSelected: { type: Object },
            onItemSelected: { type: Function }
        }
    }

</script>
