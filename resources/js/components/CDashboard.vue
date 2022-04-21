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
                <dashboard-toolbar class="col-2"></dashboard-toolbar>
                <div id="product-list" class="col">
                    <product-unit></product-unit>
                    <product-unit></product-unit>
                    <product-unit></product-unit>
                    <product-unit></product-unit>
                    <product-unit></product-unit>
                </div>
           </div>
       </div>
    </main>
</template>

<script>

import HeaderGlob from "./CHeader.vue"
import DashboardToolbar from "./CDashboardToolBar.vue"
import ProductUnit from "./CProduct.vue"
import axios from "axios"
export default {
    data: function(){
        return {}
    },
    components: {
        DashboardToolbar,
        ProductUnit,
        HeaderGlob
    },
    mounted: async function(){

        console.log(await axios.post("api/proucts"));
    }
}
</script>