<template>
    <div class="row">
        <div class="col-md-12">
            <form role="form" @submit.prevent="payment()" method="post" class="row" autocomplete="off">
                <div class="form-group col-md-4">
                    <label for="customer_id">Customer Name <span class="text-danger">*</span></label>
                    <select name="customer_id" v-model="customer_id" class="form-control" id="customer_id" @change="customer_info($event)" required>
                        <option value="" disabled selected>Select One</option>
                        <option :value="customer.id" v-for="customer in customers">{{ customer.customer_name }}</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="business_name">Business Name <span class="text-danger">*</span></label>
                    <input type="text" name="business_name" class="form-control" id="business_name" v-model="customer.business_name" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="mobile">Mobile No <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" id="mobile" v-model="customer.mobile" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="due">Previous Due <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" step="any" name="due" class="form-control" id="due" v-model="customer.due" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">Taka</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="20%">Product Name</th>
                            <th width="15%" class="text-right">Unit Price</th>
                            <th width="40%" class="text-center">Unit Size</th>
                            <th width="15%" class="text-right">Subtotal</th>
                            <th width="5%" class="text-center"><i class="fas fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, i) in items" :key="i">
                            <td>1</td>
                            <td>
                                <select name="product_id" v-model="items[i].product_id" class="form-control" id="product_id" @change="product_info($event, i)" required>
                                    <option value="" disabled selected>Select One</option>
                                    <option :value="product.id" v-for="product in products">{{ product.product_name }}</option>
                                </select>
                            </td>
                            <td class="text-right">
                                <input type="number" v-model="items[i].sale_price" name="sale_price" class="form-control text-right" @keyup="calculate_subtotal(i)">
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="number" v-for="(label, index) in item.unit_labels" name="quantity" v-model="items[i].quantities[index]" min="0" :placeholder="label" @keyup="calculate_subtotal(i)" step="any" class="form-control text-right" required>
                                </div>
                            </td>
                            <td class="text-right">
                                <input type="number" v-model="items[i].subtotal" class="form-control text-right" name="subtotal" id="subtotal" step="any" readonly>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" type="button" @click="remove_item(i)" v-show="i > 0"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5"></td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm" type="button" @click="add_more()"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-right"><strong>Total</strong></td>
                            <td colspan="2">
                                <input type="text" name="total" class="form-control" id="total" v-model="total" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Labour Cost</strong></td>
                            <td colspan="2">
                                <input type="text" name="labour_cost" class="form-control" id="labour_cost" min="0" v-model="labour_cost" @keyup="calculate_amount()" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Discount</strong></td>
                            <td colspan="2">
                                <input type="text" name="discount" class="form-control" id="discount" min="0" v-model="discount" @keyup="calculate_amount()" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                            <td colspan="2">
                                <input type="text" name="grand_total" class="form-control" id="grand_total" v-model="grand_total" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Paid Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="paid_amount" class="form-control" id="paid_amount" min="0" v-model="paid_amount" @keyup="calculate_amount()" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Due Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="due_amount" class="form-control" id="due_amount" v-model="due_amount" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Note</strong></td>
                            <td colspan="2">
                                <textarea name="details" class="form-control" id="details" v-model="details"></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right col-md-12">
                    <a href="#" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit </button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return {
                customers: {},
                customer: { },
                products: {},
                items: [
                    {
                    quantities: [],
                    product_id: '',
                    subtotal: 0,
                    subprofit: 0,
                    unit_price: 0,
                    sale_price: 0,
                    unit_size: null
                    }
                ],
                customer_id: '',
                total: 0,
                total_profit: 0,
                labour_cost: 0,
                discount: 0,
                grand_total: 0,
                paid_amount: 0,
                due_amount: 0,
                details: ''
            }
        },
        methods: {
            calculate_amount(){
                this.grand_total = (+this.total + +this.labour_cost) - this.discount
                this.due_amount = this.grand_total - this.paid_amount
            },
            add_more(){
                var item = {
                    quantities: [],
                    product_id: '',
                    subtotal: 0,
                    unit_price: 0,
                    sale_price: 0,
                    unit_size: null
                }
                this.items.push(item);
            },
            remove_item(i){
                this.items.splice(i, 1)
            },
            get_customers(){
                axios.get(baseURL + '/admin/trades/published-customers')
                    .then(response => {
                        this.customers = response.data
                    })
                    .catch(errors => console.log(errors))
            },
            customer_info(event){
                const id = event.target.value
                axios.get(baseURL + '/admin/trades/customer-info/' + id)
                    .then(response => {
                        this.customer = response.data
                    })
                    .catch(errors => console.log(errors))
            },
            get_products(){
                axios.get(baseURL + '/admin/suppliers/stock-products')
                    .then(response => {
                        this.products = response.data
                    })
                    .catch(errors => console.log(errors))
            },
            product_info(event, i){
                const id = event.target.value
                axios.get(baseURL + '/admin/trades/product-info/' + id)
                    .then(response => {
                        this.items[i].subtotal = 0
                        this.items[i].unit_price = response.data.unitPrice
                        this.items[i].sale_price = response.data.salePrice
                        this.items[i].small_unit_price = response.data.unit_price
                        this.items[i].small_sale_price = response.data.sale_price
                        this.items[i].unit_labels = response.data.unit_labels
                    })
                    .catch(errors => console.log(errors))
            },
            calculate_subtotal(i){
                axios.post(baseURL + '/admin/trades/calculate-subtotal',{
                    product_id: this.items[i].product_id,
                    quantities: this.items[i].quantities
                })
                .then(response => {
                    this.items[i].unit_size = response.data.result
                    this.items[i].small_unit_price = this.items[i].unit_price / response.data.single_unit
                    this.items[i].small_sale_price = this.items[i].sale_price / response.data.single_unit
                    this.items[i].subtotal = (response.data.result * this.items[i].small_sale_price) . toFixed(2)
                    this.items[i].subprofit = ((response.data.result * this.items[i].small_sale_price) - (response.data.result * this.items[i].small_unit_price))

                    // calculate all subtotal
                    let sum = 0
                    let profit = 0
                    for(let i = 0; i < this.items.length; i++){
                        sum += (parseFloat(this.items[i].subtotal))
                        profit += (parseFloat(this.items[i].subprofit))
                    }
                    this.total = sum
                    this.total_profit = profit
                    this.calculate_amount()
                })
                .catch(errors => console.log(errors))
            },
            payment(){
                axios.post(baseURL + '/admin/trades/payment',{
                    items: this.items,
                    customer_id: this.customer_id,
                    total: this.total,
                    total_profit: this.total_profit,
                    labour_cost: this.labour_cost,
                    discount: this.discount,
                    grand_total: this.grand_total,
                    paid_amount: this.paid_amount,
                    due_amount: this.due_amount,
                    details: this.details,
                })
                .then(response => {
                    toastr.success(response.data.message)
                    window.location.href = baseURL + '/admin/trades/invoice/show/' + response.data.id
                })
                .catch(errors => {
                    toastr.warning(errors.data.message)
                })
            }
        },
        mounted() {
            this.get_customers()
            this.get_products()
        },
        computed: {
            /*total_amount: function(){
                let sum = 0
                for(let i = 0; i < this.items.length; i++){
                    sum += (parseFloat(this.items[i].subtotal))
                }
                return sum
            }*/
        }
    }
</script>
