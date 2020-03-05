<template>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0"> Stocks Report </h3>

                    <div class="card-tools">
                        <form class="form-inline" @submit.prevent="custom_filtered_productions" autocomplete="off">
                            <div class="input-group mr-sm-2 input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Product</div>
                                </div>
                                <select name="product_id" v-model="input.product_id" class="form-control">
                                    <option value="0">All</option>
                                    <option v-for="product in products" :value="product.id">{{ product.product_name }}</option>
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
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Unit Name</th>
                                <th>Price (Per Unit)</th>
                                <th>Quantity</th>
                                <th>Alert Quantity</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr :key="index" v-for="(production, index) in productions">
                                <td>{{ production.product_id }}</td>
                                <td>{{ production.product_name }}</td>
                                <td>{{ production.unit_name }}</td>
                                <td>{{ production.unitPrice }} ({{ production.unitInfo }})</td>
                                <td>{{ stock.unitTotal }}</td>
                                <td>{{ production.stock_alert }} ({{ production.unit_size }})</td>
                                <td>
                                    {{ production.created_at|dateFormat }}
                                </td>
                            </tr>
                            </tbody>
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
                productions: [],
                search: '',
                products:[],
                input: {
                    product_id: 0,
                    from_date: '',
                    to_date: ''
                }
            }
        },
        methods: {
            today_productions() {
                axios.get(baseURL + '/admin/suppliers/report/today-productions')
                    .then(response => {
                        this.productions = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            custom_filtered_productions(){
                axios.post(baseURL + '/admin/suppliers/report/custom-filtered-productions', this.input)
                    .then(response => {
                        this.productions = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            get_products() {
                axios.get(baseURL + '/admin/suppliers/published-products')
                    .then(response => {
                        this.products = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.today_productions()
            this.get_products()
        }
    }
</script>
