/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./bootstrap');

window.Vue = require('vue');

// install vform
import { Form, HasError, AlertError } from 'vform';
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// moment js
import moment from 'moment'
Vue.filter('dateFormat', function(date) {
    return moment(date).format('DD-MM-YYYY');
});

Vue.filter('timeFormat', function(time) {
    return moment(time).format(' h:mm:ss A');
});

Vue.filter('numberFormat', function(number) {
    return number.toFixed(2);
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-product-component', require('./components/CreateProductComponent').default);
Vue.component('edit-product-component', require('./components/EditProductComponent').default);
Vue.component('production-stock', require('./components/ProductionStockComponent').default);
Vue.component('productions-report', require('./components/ProductionsReportComponent').default);
Vue.component('maintenance-report', require('./components/MaintenanceCostComponent').default);
Vue.component('trip-report', require('./components/TripsReportComponent').default);
Vue.component('sales-create', require('./components/SalesCreateComponent').default);
Vue.component('order-sheet-create', require('./components/OrderSheetCreateComponent').default);
Vue.component('change-password', require('./components/ChangePasswordComponent.vue').default);
Vue.component('update-profile', require('./components/UpdateProfileComponent.vue').default);
Vue.component('purchase-create', require('./components/PurchaseCreateComponent').default);
Vue.component('supplier-product-component', require('./components/SupplierProductComponent').default);
Vue.component('supplier-edit-product-component', require('./components/SupplierEditProductComponent').default);
Vue.component('supplier-stock', require('./components/SupplierStockComponent').default);
Vue.component('supplier-product-report', require('./components/SupplierProductReportComponent').default);
Vue.component('trades-sales-create', require('./components/TradeSalesCreateComponent').default);
Vue.component('trade-order-sheet-create', require('./components/TradeOrderSheetCreateComponent').default);
Vue.component('installment-sales-create', require('./components/InstallmentSalesCreateComponent').default);
Vue.component('sales-item-report', require('./components/SalesItemReportComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
