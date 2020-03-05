<template>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0"> Stocks Report </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input class="form-control" name="search" type="text" v-model="search" placeholder="Search product name">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-search"></i></div>
                            </div>
                            <button class="btn btn-primary btn-sm ml-2" type="button" onclick="printDiv('printable_area')"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-primary btn-sm ml-2" type="button" @click="exportExcel()"><i class="fas fa-file-excel"></i> Excel</button>
                            <button class="btn btn-primary btn-sm ml-2" type="button" @click="exportCsv()"><i class="fas fa-file-excel"></i> CSV</button>
                            <button class="btn btn-primary btn-sm ml-2" type="button" @click="exportPdf()"><i class="fas fa-file-pdf"></i> PDF</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div id="printable_area">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Unit Name</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Stock Quantity</th>
                                <th class="text-right"> Stock Subtotal</th>
                                <th>Alert Quantity</th>
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr :key="index" v-for="(stock, index) in filtered_stocks">
                                <td>{{ stock.id }}</td>
                                <td>{{ stock.product_name }}</td>
                                <td>{{ stock.unit_name }}</td>
                                <td>{{ stock.unitPrice }} ({{ stock.unitInfo }})</td>
                                <td>{{ stock.salePrice }} ({{ stock.unitInfo }})</td>
                                <td>{{ stock.unitTotal }}</td>
                                <td class="text-right">{{ stock.unit_price * stock.stock_quantity }}</td>
                                <td>{{ stock.stock_alert }} ({{ stock.unit_size }})</td>
                                <td>
                                    {{ stock.updated_at|dateFormat }}
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="bg-secondary">
                                <td colspan="6"><strong>Grand Total:</strong></td>
                                <td class="text-right"><strong>{{ grandTotal }}</strong></td>
                                <td colspan="2">&nbsp;</td>
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
                stocks: [],
                search: ''
            }
        },
        methods: {
            exportExcel(){
                var win = window.open(baseURL + '/admin/suppliers/report/xls-export')
                win.document.close();
                setTimeout(function () {
                    win.focus();
                    win.close();
                }, 100);
                // window.location.href = baseURL + '/admin/suppliers/report/xls-export'
            },
            exportCsv(){
                var win = window.open(baseURL + '/admin/suppliers/report/csv-export')
                win.document.close();
                setTimeout(function () {
                    win.focus();
                    win.close();
                }, 100);
                // window.location.href = baseURL + '/admin/suppliers/report/xls-export'
            },
            exportPdf(){
                var win = window.open(baseURL + '/admin/suppliers/report/stock-pdf')
                win.document.close();
                setTimeout(function () {
                    win.focus();
                    win.close();
                }, 100);
                // window.location.href = baseURL + '/admin/suppliers/report/xls-export'
            },
            get_stocks() {
                axios.get(baseURL + '/admin/suppliers/report/get-stocks')
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
            grandTotal: function(){
                let sum = 0
                for(let i = 0; i < this.stocks.length; i++){
                    sum += (parseFloat(this.stocks[i].unit_price * this.stocks[i].stock_quantity))
                }
                return sum
            }
        }
    }
</script>
