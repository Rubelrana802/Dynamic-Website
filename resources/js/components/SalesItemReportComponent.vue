<template>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0 mt-1"> Sales Item Report </h3>

                    <div class="card-tools">
                        <form class="form-inline" @submit.prevent="custom_filtered_items" autocomplete="off">
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
                                <th class="text-center">#</th>
                                <th class="text-left">Product Name </th>
                                <th class="text-center">Quantity </th>
                                <th class="text-right">Unit Price </th>
                                <th class="text-right">Sub Total </th>
                                <th class="text-center">Date </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr :key="index" v-for="(item, index) in items">
                                <td class="text-center"> {{ index+ +1 }} </td>
                                <td class="text-left"> {{ item.product_name }} </td>
                                <td class="text-center"><span>{{ item.unitTotal }}</span> </td>
                                <td class="text-right"><span>{{ item.maxUnitPrice }}</span> ৳</td>
                                <td class="text-right"><span>{{ item.sub_total }}</span> ৳</td>
                                <td class="text-center"><span>{{ item.created_at | dateFormat }}</span></td>
                            </tr>
                            </tbody>
                            <tfoot  class="bg-secondary">
                            <tr>
                                <td colspan="4">Grand Total</td>
                                <td class="text-right">{{ grandTotal }} ৳</td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</template>

<script>
    export default {
        data() {
            return {
                items:{},
                input: {
                    from_date: '',
                    to_date: ''
                }
            }
        },
        methods: {
            custom_filtered_items(){
                axios.post(baseURL + '/admin/trades/reports/custom-sales-item', this.input)
                    .then(response => {
                        this.items = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            get_items() {
                axios.get(baseURL + '/admin/trades/reports/today-sales-item')
                    .then(response => {
                        this.items = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.get_items()
        },
        computed: {
            grandTotal: function(){
                let sum = 0
                for(let i = 0; i < this.items.length; i++){
                    sum += (parseFloat(this.items[i].sub_total))
                }
                return sum
            }
        }
    }
</script>
