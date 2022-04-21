<style scoped>
.card {
    width: 350px;
    height: 370px
}

.image {
    position: absolute;
    right: 12px;
    top: 10px
}

.main-heading {
    font-size: 40px;
    color: red !important
}

.ratings i {
    color: orange
}

.user-ratings h6 {
    margin-top: 2px
}

.colors {
    display: flex;
    margin-top: 2px
}

.colors span {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    margin-right: 6px
}

.colors span:nth-child(1) {
    background-color: red
}

.colors span:nth-child(2) {
    background-color: blue
}

.colors span:nth-child(3) {
    background-color: yellow
}

.colors span:nth-child(4) {
    background-color: purple
}

.btn-danger {
    height: 48px;
    font-size: 18px
}
</style>

<template>
    <div class="height d-flex justify-content-center align-items-center">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center ">
                <div class="mt-2">
                    <h4 class="text-uppercase">Ikea</h4>
                    <div class="mt-5">
                        <h5 class="text-uppercase mb-0"></h5>
                        <h1 class="main-heading mt-0">VASE</h1>
                        <div class="d-flex flex-row user-ratings">
                            <div class="ratings"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <h6 class="text-muted ml-1">4/5</h6>
                        </div>
                    </div>
                </div>
                <div class="image"> <img :src="`/images/products/${Product.product_image}`" width="200" height="200"> </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                 <span>{{Product.product_name}}</span>
            </div>
            <p>{{Product.product_desc}}</p> 
            <button class="btn btn-danger" @click="addToCart">Add to cart</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['Product'],
    methods:{
        addToCart: async function(){
            await axios.post("/api/cart", {
                product_id: this.Product.id
            });
        }
    }
}
</script>
