<style>
#product-list {
    display: flex;
    flex-flow: wrap;
}
</style>

<template>
    <main class="col">
       <div class="container">
           <div class="row">
                <dashboard-toolbar class="col-3"></dashboard-toolbar>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Add product</h4>
                    <form class="needs-validation" novalidate="" @submit.prevent="addProduct">
                        <div class="row g-3" style="margin-bottom: 30px;">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Product Name</label>
                                <input type="text" v-model="Product.name" class="form-control" id="firstName" placeholder="" required="">
                                <div class="invalid-feedback d-block" v-if="ErrorMsgs.product_name">
                                    {{ErrorMsgs.product_name[0]}}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Product Desc</label>
                                <textarea v-model="Product.desc" type="text" class="form-control" id="firstName" placeholder="" required=""></textarea>
                                 <div class="invalid-feedback d-block" v-if="ErrorMsgs.product_desc">
                                    {{ErrorMsgs.product_desc[0]}}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Category <span class="text-muted">(Optional)</span></label>
                                <select v-model="Product.cat" type="text" class="form-select">
                                    <option v-for="Cat of categories" :key="Cat.id" :value="Cat.id">{{Cat.category_title}}</option>
                                </select>
                                <div class="invalid-feedback d-block" v-if="ErrorMsgs.category_id">
                                    {{ErrorMsgs.category_id[0]}}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="country" class="form-label">Product Price</label>
                                <input v-model.number="Product.price" type="number" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback d-block" v-if="ErrorMsgs.product_price">
                                    {{ErrorMsgs.product_price[0]}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="form-label">Product Sale</label>
                                <input  v-model.number="Product.sale" type="number"  class="form-control" id="firstName" placeholder="" value="" required="">
                                 <div class="invalid-feedback d-block" v-if="ErrorMsgs.product_image">
                                    {{ErrorMsgs.product_image[0]}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1" >Example file input</label>
                                <input @change="Product.image = $event.target.files || $event.dataTransfer.files" type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <button :disabled="!isReady" class="w-100 btn btn-primary btn-lg" type="submit">add product</button>
                    </form>
                </div>
           </div>
       </div>
    </main>
</template>

<script>

import HeaderGlob from "./CHeader.vue"
import DashboardToolbar from "./CDashboardToolBar.vue"
import axios from "axios"
export default {
    data(){
        return {
            ErrorMsgs: {},
            isReady: false,
            categories: [],
            Product: {
                name: "",
                desc: "",
                cat: 0,
                price:0,
                sale: 0,
                image: []
            }
        };
    },

    components: {
        DashboardToolbar,
        HeaderGlob
    },
    mounted: async function(){
        this.getAllCategory();
        
    },
    methods: {
        getAllCategory: async function(){
            this.isReady = false;
            try{
                
                const Res = await axios.get("/api/category");
                if(Res.status == 200){
                    this.categories = Res.data;
                }
            }catch(e){
                console.log(e)
            }
            this.isReady = true;
        },

        addProduct: async function(){

           this.isReady = false;
            let body = new FormData();
            body.append("product_name", this.Product.name);
            body.append("product_desc", this.Product.desc);
            body.append("product_cat", this.Product.cat);
            body.append("product_price", this.Product.price);
            body.append("product_sale", this.Product.sale);

            if(this.Product.image.length)
                body.append("product_image", this.Product.image[0]);
            try{
                console.log(await axios.post("/api/proucts", body))
                window.location.href = "/home"
                this.isReady = true;
            }catch(e){
                const Res = e.response;
                if(Res.status == 422){
                    this.ErrorMsgs = e.response.data.errors; 
                }
            }

            this.isReady = true;
        }
    }
    
}
</script>