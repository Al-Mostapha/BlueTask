<style scoped>
#product-wrapper{
    display: flex;
    flex-flow: wrap;
}
</style>
<template>
    <div class="row">
        <div id="product-wrapper" class="col">
            <product-unit v-for="Product in ProductList" v-bind:key="Product.key" :Product="Product"></product-unit>
        </div>
        <div class="col-3">
            <category-brand></category-brand>
        </div>
    </div>
</template>
<script>
import HeaderGlob from "./CHeader.vue";
import ProductUnit from "./CProduct.vue";
import CategoryBrand from "./CCategoryBrand.vue";
import axios from "axios"

export default{
    data(){
        return{
            ProductList: []
        }
       
    },
    mounted(){
        this.getProducts();
    },
    methods:{
        getProducts: async function (){
            try{
                const ProductRes = await axios.get("/api/proucts");
                this.ProductList = ProductRes.data;
            }catch(e){

                console.log(e)

            }
        }
    },


    components: {
        HeaderGlob,
        ProductUnit,
        CategoryBrand
    }
}
</script>

