<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0"> Maintenance Report </h3>

                    <div class="card-tools">
                        <form class="form-inline" @submit.prevent="custom_filtered_costs" autocomplete="off">
                            <div class="input-group mr-sm-2 input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">From</div>
                                </div>
                                <input name="from_date" v-model="input.from_date" type="date" class="form-control">
                            </div>
                            <div class="input-group mr-sm-2 input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">To</div>
                                </div>
                                <input name="to_date" v-model="input.to_date" type="date" class="form-control">
                            </div>

                            <button class="btn btn-primary btn-sm mr-2" type="submit"><i class="fas fa-search"></i></button>
                            <button class="btn btn-primary btn-sm" type="button" onclick="printDiv('printable_area')"><i class="fa fa-print"></i></button>

                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div id="printable_area">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Maintenance Id</th>
                                <th>Transport No</th>
                                <th>Maintenance Name</th>
                                <th class="text-right">Amount</th>
                                <th class="text-right">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(cost, index) in costs" :key="index">
                                <td>{{ cost.transport_maintenance_id }}</td>
                                <td>{{ cost.transport.transport_no }}</td>
                                <td>{{ cost.maintenance_name }}</td>
                                <td class="text-right">{{ cost.cost_amount }}</td>
                                <td class="text-right">{{ cost.created_at|dateFormat }}</td>
                            </tr>
                            </tbody>
                            <tfoot class="bg-secondary">
                            <tr>
                                <td colspan="3">Total</td>
                                <td class="text-right">{{ grandTotal }}</td>
                                <td class="text-right"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                costs: {},
                input: {
                    from_date: '',
                    to_date: ''
                }
            }
        },
        methods: {
            today_costs() {
                axios.get(baseURL + '/admin/transports/reports/today-maintenance-costs')
                    .then(response => {
                        this.costs = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            custom_filtered_costs() {
                axios.post(baseURL + '/admin/transports/reports/custom-filtered-maintenance-costs', this.input)
                    .then(response => {
                        this.costs = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.today_costs()
        },
        computed: {
            grandTotal: function(){
                let sum = 0
                for(let i = 0; i < this.costs.length; i++){
                    sum += (parseFloat(this.costs[i].cost_amount))
                }
                return sum
            }
        }
    }
</script>
