require('./bootstrap');
require('../sass/app.scss')
import Vue from 'vue'

window.Vue = require('vue');


import HeaderComp from "./components/CHeader";




// router
import router from './routes.js';
window.router = router;
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
    components: {
        "header-glob": HeaderComp
    }
}).$mount('#app');