require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('productos-component', require('./components/ListadoProductos.vue').default);
Vue.component('form-component', require('./components/FormProducto.vue').default);


const app = new Vue({
    el: '#app',
});
