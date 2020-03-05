<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form @submit.prevent="createProduct()" autocomplete="off">

                <div class="form-group">
                    <label>Product Name <span class="text-danger">*</span></label>
                    <select :class="{ 'is-invalid': form.errors.has('product_id') }" class="form-control"
                            name="product_id" v-model="form.product_id">
                        <option selected value=""> Select One</option>
                        <option :value="product.id" v-for="product in published_products">{{ product.product_name }} ({{ product.category.category_name }})</option>
                    </select>
                    <has-error :form="form" field="product_id"></has-error>
                </div>
                <div class="form-group">
                    <label>Unit Name <span class="text-danger">*</span></label>
                    <select :class="{ 'is-invalid': form.errors.has('unit_id') }" @change="unit_info($event)" class="form-control"
                            name="unit_id" v-model="form.unit_id">
                        <option selected value=""> Select One</option>
                        <option :value="unit.id" v-for="unit in published_units">{{ unit.unit_name }}</option>
                    </select>
                    <has-error :form="form" field="unit_id"></has-error>
                </div>
                <div class="form-group row" v-if="units_info.length > 0">
                    <div :key="index" class="input-group col" v-for="(label, index) in units_info">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ label }}</span>
                        </div>
                        <input :class="{ 'is-invalid': form.errors.has('quantity') }" :placeholder="label"
                               class="form-control" type="number" v-model="form.quantity[index]">
                    </div>
                    <has-error :form="form" field="quantity"></has-error>
                </div>
                <div class="form-group">
                    <label>Purchase Price <span class="text-primary"
                                            v-if="units_info.length > 0">(Per {{ units_info[0] }})</span><span
                        class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('unit_price') }" class="form-control"
                           name="unit_price"
                           step="any" type="number" v-model="form.unit_price">
                    <has-error :form="form" field="unit_price"></has-error>
                </div>
                <div class="form-group">
                    <label>Sale Price <span class="text-primary"
                                            v-if="units_info.length > 0">(Per {{ units_info[0] }})</span><span
                        class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('sale_price') }" class="form-control"
                           name="sale_price"
                           step="any" type="number" v-model="form.sale_price">
                    <has-error :form="form" field="sale_price"></has-error>
                </div>
                <div class="form-group">
                    <label>Stock Alert <span class="text-primary" v-if="units_info.length > 0">({{ units_info[units_info.length - 1] }})</span>
                        <span class="text-danger">*</span></label>
                    <input :class="{ 'is-invalid': form.errors.has('stock_alert') }" class="form-control"
                           name="stock_alert"
                           type="text" v-model="form.stock_alert" autocomplete="off">
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
        data() {
            return {
                published_products: {},
                published_units: {},
                units_info: {},
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
            createProduct() {
                this.form.post('/admin/suppliers/products')
                    .then(response => {
                        if(response.data.success == true){
                            // reset unit info array
                            this.units_info = {};
                            // reset form elements
                            this.form.reset();
                            // redirect to product view page view
                            // window.location.href = baseURL + '/admin/productions/finished-products/' + response.data.id
                            toastr.success(response.data.message)
                        } else {
                            toastr.warning(response.data.message)
                        }

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
            }
        },
        mounted() {
            this.units()
            this.products()
        },
        computed: {}
    }
</script>
