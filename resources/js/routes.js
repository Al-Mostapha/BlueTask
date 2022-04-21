import Vue from 'vue'
import VueRouter from 'vue-router'
import home from './routes/home'
import signupComp from './components/CSignupForm.vue'
import loginComp  from './components/CLoginForm.vue'
import productPageComp  from './components/CProductPagination.vue'
import cartComp  from './components/CCart.vue'
import dashboardComp  from './components/CDashboard.vue'
import addProductComp  from './components/CDashboardAddProduct.vue'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            
            path: '/signup',
            component: signupComp,
            name: 'signup',
        },
        {
            path: '/login',
            component: loginComp,
            name: 'login',
        },
        {
            path: '/home',
            component: productPageComp,
            name: 'product',
        },
        {
            path: '/cart',
            component: cartComp,
            name: 'cart',
        },
        {
            path: '/admin',
            component: dashboardComp,
            name: 'dashboard',
        },
        {
            path: '/admin/product',
            component: dashboardComp,
            name: 'dashboard.product',
        },
        {
            path: '/admin/product/add',
            component: addProductComp,
            name: 'dashboard.product.add',
        }
    ],
});