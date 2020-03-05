<template>
    <div class="row">
        <div class="col-md-12">
            <form role="form" @submit.prevent="payment()" method="post" class="row" autocomplete="off">
                <div class="form-group col-md-4">
                    <label for="date">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" v-model="date" class="form-control" id="date" required>
                </div>
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
                            <th width="40%">Unit</th>
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
                                {{ items[i].unit_price }}
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="number" v-for="(label, index) in item.unit_labels" name="quantity" v-model="items[i].quantities[index]" min="0" :placeholder="label" @keyup="calculate_subtotal(i)" step="any" class="form-control text-right" required>
                                </div>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" type="button" @click="remove_item(i)" v-show="i > 0"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm" type="button" @click="add_more()"><i class="fas fa-plus"></i></button>
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
                customer: {},
                products: {},
                items: [
                    {
                    quantities: [],
                    product_id: '',
                    unit_price: 0,
                    unit_size: null
                    }
                ],
                customer_id: '',
                date: '',
            }
        },
        methods: {
            add_more(){
                var item = {
                    quantities: [],
                    product_id: '',
                    unit_price: 0,
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
                        this.items[i].unit_price = response.data.unitPrice
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
                    })
                    .catch(errors => console.log(errors))
            },
            payment(){
                axios.post(baseURL + '/admin/trades/order-sheets',{
                    items: this.items,
                    customer_id: this.customer_id,
                    date: this.date,
                })
                .then(response => {
                    console.log(response.data)
                    toastr.success(response.data.message)
                    window.location.href = baseURL + '/admin/trades/order-sheets/' + response.data.id
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
