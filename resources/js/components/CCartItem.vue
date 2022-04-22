<style>
body{margin-top:20px;}
.cart-item-thumb {
    display: block;
    width: 10rem
}

.cart-item-thumb>img {
    display: block;
    width: 100%
}

.product-card-title>a {
    color: #222;
}

.font-weight-semibold {
    font-weight: 600 !important;
}

.product-card-title {
    display: block;
    margin-bottom: .75rem;
    padding-bottom: .875rem;
    border-bottom: 1px dashed #e2e2e2;
    font-size: 1rem;
    font-weight: normal;
}

.text-muted {
    color: #888 !important;
}

.bg-secondary {
    background-color: #f7f7f7 !important;
}

.accordion .accordion-heading {
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: bold;
}
.font-weight-semibold {
    font-weight: 600 !important;
}
</style>
<template>
    <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
        <div class="media d-block d-sm-flex text-center text-sm-left">
            <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img :src="`/images/products/${item.product_image}`" alt="Product"></a>
            <div class="media-body pt-3">
                <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">{{item.product_name}}</a></h3>
                <div class="font-size-sm">{{item.product_desc}}</div>
                <div class="font-size-lg text-primary pt-2">{{item.product_price.toFixed(2)}}</div>
            </div>
        </div>
        <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
            <div class="form-group mb-2">
                <label for="quantity1">Quantity</label>
                <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
            </div>
            <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                    <polyline points="23 4 23 10 17 10"></polyline>
                    <polyline points="1 20 1 14 7 14"></polyline>
                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                </svg>Update cart</button>
            <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button" @click="removeItemFromCart" :disabled="idDisabled">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>Remove</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return {
            idDisabled : false
        }
    },
    props: ["item"],
    components:{
    },
    mounted() {
        
    },
    methods: {
        removeItemFromCart: async function(){
            this.idDisabled = true;
            await axios.delete(`api/cart/${this.item.item_id}`);
            window.location.reload(true);
            this.idDisabled = false;
        }
    }
}
</script>