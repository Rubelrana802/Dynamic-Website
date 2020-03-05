<template>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0 mt-1"> Stocks Report </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input class="form-control" name="search" type="text" v-model="search">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-search"></i></div>
                            </div>
                            <button class="btn btn-primary btn-sm ml-2" type="button" onclick="printDiv('printable_area')"><i class="fa fa-print"></i></button>
                        </div>
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
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr :key="index" v-for="(stock, index) in filtered_stocks">
                                <td>{{ stock.finished_product_stock_id }}</td>
                                <td>{{ stock.product_name }}</td>
                                <td>{{ stock.unit_name }}</td>
                                <td>{{ stock.unitPrice }} ({{ stock.unitInfo }})</td>
                                <td>{{ stock.unitTotal }}</td>
                                <td>{{ stock.stock_alert }} ({{ stock.unit_size }})</td>
                                <td>
                                    {{ stock.updated_at|dateFormat }}
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
                stocks: [],
                search: ''
            }
        },
        methods: {
            get_stocks() {
                axios.get(baseURL + '/admin/productions/reports/get-stocks')
                    .then(response => {
                        this.stocks = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
        },
        mounted() {
            this.get_stocks()
        },
        computed: {
            filtered_stocks() {
                /*return this.stocks.filter(stock => {
                    return stock.product_name.toLowerCase().includes(this.search.toLowerCase())
                })*/

                if (this.stocks) {
                    return this.stocks.filter((item) =>
                        item.product_name.toLowerCase().includes(this.search.toLowerCase())
                        || item.unit_name.toLowerCase().includes(this.search.toLowerCase())
                        || item.finished_product_stock_id.includes(this.search)
                    );
                }
            },
            /*tableFilter() {
                if (this.model.data) {
                    return this.model.data.filter((item) =>
                        item.name.includes(this.search_by_name)
                        && item.email.includes(this.search_by_email)
                        && item.status === this.pending_or_completed);
                }
            }*/
        }
    }
</script>
