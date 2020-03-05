<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form @submit.prevent="updateProduct()" autocomplete="off">
                <div class="form-group">
                    <label>Product Name <span class="text-danger">*</span></label>
                    <select :class="{ 'is-invalid': form.errors.has('product_id') }" class="form-control"
                            name="product_id" v-model="form.product_id" readonly>
                        <option selected value=""> Select One</option>
                        <option :value="product.id" v-for="product in published_products">{{ product.product_name }}
                        </option>
                    </select>
                    <has-error :form="form" field="product_id"></has-error>
                </div>
                <div class="form-group">
                    <label>Unit Name <span class="text-danger">*</span></label>
                    <select :class="{ 'is-invalid': form.errors.has('unit_id') }" @change="unit_info($event)" class="form-control"
                            readonly name="unit_id" v-model="form.unit_id">
                        <option selected value=""> Select One</option>
                        <option :value="unit.id" v-for="unit in published_units">{{ unit.unit_name }}</option>
                    </select>
                    <has-error :form="form" field="unit_id"></has-error>
                </div>

                <div class="form-group row">
                    <div :key="index" class="input-group col" v-for="(label, index) in stock_info.result">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ stock_info.labels[index] }}</span>
                        </div>
                        <input :class="{ 'is-invalid': form.errors.has('quantity') }" class="form-control"
                               type="number" v-model="form.quantity[index]" value="label" readonly>
                    </div>
                    <has-error :form="form" field="quantity"></has-error>
                </div>

                <div class="form-group">
                    <label>Purchase Price <span class="text-primary">(Per {{ unit_price_label }})</span><span
                        class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('unit_price') }" class="form-control"
                           name="unit_price"
                           step="any" type="number" v-model="form.unit_price">
                    <has-error :form="form" field="unit_price"></has-error>
                </div>
                <div class="form-group">
                    <label>Sale Price <span class="text-primary">(Per {{ unit_price_label }})</span><span
                        class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('sale_price') }" class="form-control"
                           name="sale_price"
                           step="any" type="number" v-model="form.sale_price">
                    <has-error :form="form" field="sale_price"></has-error>
                </div>
                <div class="form-group">
                    <label>Stock Alert <span class="text-primary">({{ stock_unit_label }})</span><span
                        class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('stock_alert') }" class="form-control"
                           name="stock_alert"
                           type="text" v-model="form.stock_alert">
                    <has-error :form="form" field="stock_alert"></has-error>
                </div>
                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select :class="{ 'is-invalid': form.errors.has('status') }" class="form-control" name="status"
                            v-model="form.status">
                        <option selected value=""> Select One</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                    <has-error :form="form" field="status"></has-error>
                </div>
                <div class="text-right">
                    <a class="btn btn-danger" href="#"><i class="fas fa-times"></i> Cancel </a>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product_id'],
        data() {
            return {
                published_products: {},
                published_units: {},
                units_info: {},
                stock_info: {},
                unit_price_label: '',
                stock_unit_label: '',
                form: new Form({
                    id: '',
                    unit_id: '',
                    product_id: '',
                    quantity: [],
                    unit_price: '',
                    sale_price: '',
                    stock_alert: '',
                    status: '',
                })
            }
        },
        methods: {
            updateProduct() {
                this.form.put(baseURL + '/admin/suppliers/products/' + this.form.id)
                    .then(response => {
                        console.log(response.data);
                        // reset unit info array
                        // this.units_info = {}
                        // reset form elements
                        // this.form.reset()
                        // redirect to product view page view
                        // window.location.href = baseURL + '/admin/productions/finished-products/' + response.data.id
                        toastr.success(response.data.message)
                    })
                    .catch(errors => {
                        toastr.warning(errors.data.message)
                    })
            },
            units() {
                axios.get(baseURL + '/admin/settings/published-units')
                    .then(response => {
                        this.published_units = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            products() {
                axios.get(baseURL + '/admin/suppliers/published-products')
                    .then(response => {
                        this.published_products = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            unit_info(event) {
                const id = event.target.value;
                axios.get(baseURL + '/admin/settings/unit-info/' + id)
                    .then(response => {
                        this.units_info = response.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            product_info() {
                axios.get(baseURL + '/admin/suppliers/finished-product-info/' + this.product_id)
                    .then(response => {
                        this.form.reset();
                        this.stock_info = response.data.stock_info;
                        this.unit_price_label = response.data.stock_info.labels[0];
                        this.stock_unit_label = response.data.stock_info.labels[response.data.stock_info.labels.length - 1];
                        this.form.fill(response.data)
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.units()
            this.products()
            this.product_info()
        },
        computed: {}
    }
</script>
