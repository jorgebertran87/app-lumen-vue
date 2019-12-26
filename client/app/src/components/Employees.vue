<template>
    <b-table
            id="employees"
            responsive
            striped
            bordered
            :items="items"
            :busy.sync="isBusy"
    >
        <template v-slot:cell(id)="row">
            <EmployeeDetail
                    :item="row.item"
                    :itemSelected="itemSelected"
                    :onItemSelected="onItemSelected"
            />
        </template>

    </b-table>
</template>

<script>
    import EmployeeDetail from './EmployeeDetail.vue';
    export default {
        name: 'Employees',
        components: {
            EmployeeDetail
        },
        data() {
            return {
                isBusy: false,
            }
        },
        props: {
            items: { type: Array },
            onItemSelected: { type: Function },
            itemSelected: { type: Object }
        }
    }

</script>
