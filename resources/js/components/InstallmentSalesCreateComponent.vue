<template>
    <div class="row">
        <div class="col-md-12">
            <form role="form" @submit.prevent="payment()" method="post" class="row" autocomplete="off">
                <div class="form-group col-md-4">
                    <label for="customer_id">Customer Name <span class="text-danger">*</span></label>
                    <select name="customer_id" v-model="customer_id" class="form-control" id="customer_id" @change="customer_info($event)" required>
                        <option value="" disabled selected>Select One</option>
                        <option :value="customer.id" v-for="customer in customers">{{ customer.customer_name }} | {{ customer.mobile }}</option>
                    </select>
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

                <div class="form-group col-md-4">
                    <label for="guarantor_name">Guarantor Name <span class="text-danger">*</span></label>
                    <input type="text" name="guarantor_name" class="form-control" id="guarantor_name" v-model="customer.guarantor_name" readonly>
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
                                <input type="number" v-model="items[i].unit_price" name="unit_price" class="form-control text-right" @keyup="calculate_subtotal(i)">
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
                            <td colspan="4" class="text-right"><strong>Delivery Charge</strong></td>
                            <td colspan="2">
                                <input type="text" name="delivery_charge" class="form-control" id="delivery_charge" min="0" v-model="delivery_charge" @keyup="calculate_amount()" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Interest Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="interest_amount" class="form-control" id="interest_amount" min="0" v-model="interest_amount" @keyup="calculate_amount()" required>
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
                            <td colspan="4" class="text-right"><strong>Down Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="down_payment" class="form-control" id="down_payment" min="0" v-model="down_payment" @keyup="calculate_amount()" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Due Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="due_amount" class="form-control" id="due_amount" v-model="due_amount" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-right"><strong>Total Installment</strong></td>
                            <td colspan="2">
                                <input type="text" name="total_installment" class="form-control" id="total_installment" min="0" v-model="total_installment" @keyup="calculate_installment()">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Fine Amount</strong></td>
                            <td colspan="2">
                                <input type="text" name="total_fine" class="form-control" id="total_fine" min="0" v-model="total_fine">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Amount of Per Installment</strong></td>
                            <td colspan="2">
                                <input type="text" name="amount_of_per_installment" class="form-control" id="amount_of_per_installment" v-model="amount_of_per_installment" readonly>
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
                drivers: {},
                customer: {},
                products: {},
                items: [
                    {
                    quantities: [],
                    product_id: '',
                    subtotal: 0,
                    unit_price: 0,
                    unit_size: null
                    }
                ],
                customer_id: '',
                total: 0,
                delivery_charge: 0,
                interest_amount: 0,
                discount: 0,
                grand_total: 0,
                down_payment: 0,
                total_installment: 0,
                amount_of_per_installment: 0,
                total_fine: 0,
                due_amount: 0,
                details: ''
            }
        },
        methods: {
            calculate_amount(){
                this.grand_total = (+this.total + +this.delivery_charge + +this.interest_amount) - this.discount
                this.due_amount = this.grand_total - this.down_payment
            },

            calculate_installment(){
                this.amount_of_per_installment = this.due_amount / this.total_installment
            },

            add_more(){
                var item = {
                    quantities: [],
                    product_id: '',
                    subtotal: 0,
                    unit_price: 0,
                    unit_size: null
                }
                this.items.push(item);
            },
            remove_item(i){
                this.items.splice(i, 1)
            },
            get_customers(){
                axios.get(baseURL + '/admin/installments/published-customers')
                    .then(response => {
                        this.customers = response.data
                    })
                    .catch(errors => console.log(errors))
            },
            customer_info(event){
                const id = event.target.value
                axios.get(baseURL + '/admin/installments/customer-info/' + id)
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
                axios.get(baseURL + '/admin/installments/product-info/' + id)
                    .then(response => {
                        this.items[i].subtotal = 0
                        this.items[i].unit_price = response.data.unitPrice
                        this.items[i].small_unit_price = response.data.unit_price
                        this.items[i].unit_labels = response.data.unit_labels
                    })
                    .catch(errors => console.log(errors))
            },
            calculate_subtotal(i){
                axios.post(baseURL + '/admin/installments/calculate-subtotal',{
                    product_id: this.items[i].product_id,
                    quantities: this.items[i].quantities
                })
                .then(response => {
                    this.items[i].unit_size = response.data.result
                    this.items[i].small_unit_price = this.items[i].unit_price / response.data.single_unit
                    this.items[i].subtotal = (response.data.result * this.items[i].small_unit_price) . toFixed(2)

                    // calculate all subtotal
                    let sum = 0
                    for(let i = 0; i < this.items.length; i++){
                        sum += (parseFloat(this.items[i].subtotal))
                    }
                    this.total = sum
                    this.calculate_amount()
                })
                .catch(errors => console.log(errors))
            },
            payment(){
                axios.post(baseURL + '/admin/installments/payment',{
                    items: this.items,
                    customer_id: this.customer_id,
                    total: this.total,
                    delivery_charge: this.delivery_charge,
                    interest_amount: this.interest_amount,
                    total_fine: this.total_fine,
                    amount_of_per_installment: this.amount_of_per_installment,
                    total_installment: this.total_installment,
                    discount: this.discount,
                    grand_total: this.grand_total,
                    down_payment: this.down_payment,
                    paid_amount: this.paid_amount,
                    due_amount: this.due_amount,
                    details: this.details,
                })
                .then(response => {
                    toastr.success(response.data.message)
                    window.location.href = baseURL + '/admin/installments/invoice/show/' + response.data.id
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
