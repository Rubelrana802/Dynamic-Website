<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0"> Trip Report </h3>

                    <div class="card-tools">
                        <form class="form-inline" @submit.prevent="custom_filtered_trips">
                            <div class="input-group mr-sm-2 input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Transport</div>
                                </div>
                                <select name="transport_id" v-model="input.transport_id" class="form-control">
                                    <option value="0">All</option>
                                    <option v-for="transport in transports" :value="transport.id">{{ transport.transport_no }}</option>
                                </select>
                            </div>
                            <div class="input-group mr-sm-2 input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Driver</div>
                                </div>
                                <select name="driver_id" v-model="input.driver_id" class="form-control">
                                    <option value="0">All</option>
                                    <option v-for="driver in drivers" :value="driver.id">{{ driver.driver_name }}</option>
                                </select>
                            </div>
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
                                <th>Trip Id</th>
                                <th>Trip Name</th>
                                <th>Driver Name</th>
                                <th>Transport No</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th class="text-right">Driver Payment</th>
                                <th class="text-right">Trip Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(trip, index) in trips" :key="index">
                                    <td>{{ trip.trip_id }}</td>
                                    <td>{{ trip.trip_name  }}</td>
                                    <td>{{ trip.driver.driver_name  }}</td>
                                    <td>{{ trip.transport.transport_no  }}</td>
                                    <td>{{ trip.date|dateFormat }}</td>
                                    <td>{{ trip.from }}</td>
                                    <td>{{ trip.to }}</td>
                                    <td class="text-right">{{ trip.driver_payment }}</td>
                                    <td class="text-right">{{ trip.trip_cost }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-secondary">
                            <tr>
                                <td colspan="7">Total</td>
                                <td class="text-right">{{ totalDriverPayment }}</td>
                                <td class="text-right">{{ totalTripCost }}</td>
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
                trips: {},
                drivers: {},
                transports: {},
                input: {
                    transport_id: 0,
                    driver_id: 0,
                    from_date: '',
                    to_date: ''
                }
            }
        },
        methods: {
            today_trips() {
                axios.get(baseURL + '/admin/transports/reports/today-trips')
                    .then(response => {
                        this.trips = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            published_drivers() {
                axios.get(baseURL + '/admin/transports/published-drivers')
                    .then(response => {
                        this.drivers = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            published_transports() {
                axios.get(baseURL + '/admin/transports/published-transports')
                    .then(response => {
                        this.transports = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            custom_filtered_trips() {
                axios.post(baseURL + '/admin/transports/reports/custom-filtered-trips', this.input)
                    .then(response => {
                        this.trips = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.today_trips()
            this.published_drivers()
            this.published_transports()
        },
        computed: {
            totalTripCost: function(){
                let sum = 0
                for(let i = 0; i < this.trips.length; i++){
                    sum += (parseFloat(this.trips[i].trip_cost))
                }
                return sum
            },
            totalDriverPayment: function(){
                let sum = 0
                for(let i = 0; i < this.trips.length; i++){
                    sum += (parseFloat(this.trips[i].driver_payment))
                }
                return sum
            }
        }
    }
</script>
