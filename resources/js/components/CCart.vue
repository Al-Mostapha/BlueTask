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
   <div>
    <div class="container pb-5 mt-n2 mt-md-n3">
        <div class="row">
            <div class="col-xl-9 col-md-8">
                <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Products</span><a class="font-size-sm" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;"><polyline points="15 18 9 12 15 6"></polyline></svg>Continue shopping</a></h2>
                <!-- Item-->
                <cart-item v-for="Item of CartItems" :key="Item.item_id" :item="Item"></cart-item>
            </div>
            <!-- Sidebar-->
            <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
                <div class="h3 font-weight-semibold text-center py-3">$325.00</div>
                <hr>
                <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Additional comments</h3>
                <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
                <a class="btn btn-primary btn-block" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>Proceed to Checkout</a>
                <div class="pt-4">
                    <div class="accordion" id="cart-accordion">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply promo code<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                            </div>
                            <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="cart-promocode" placeholder="Promo code" required="">
                                            <div class="invalid-feedback">Please provide a valid promo code!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading font-weight-semibold"><a class="collapsed" href="#shipping" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shipping">Shipping estimates<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                            </div>
                            <div class="collapse" id="shipping" data-parent="#cart-accordion">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <select class="form-control custom-select" required="">
                                                <option value="">Choose your country</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Finland">Finland</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="United States">United States</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose your country!</div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control custom-select" required="">
                                                <option value="">Choose your city</option>
                                                <option value="Bern">Bern</option>
                                                <option value="Brussels">Brussels</option>
                                                <option value="Canberra">Canberra</option>
                                                <option value="Helsinki">Helsinki</option>
                                                <option value="Mexico City">Mexico City</option>
                                                <option value="Ottawa">Ottawa</option>
                                                <option value="Washington D.C.">Washington D.C.</option>
                                                <option value="Wellington">Wellington</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose your city!</div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="ZIP / Postal code" required="">
                                            <div class="invalid-feedback">Please provide a valid zip!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Calculate shipping</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</template>
<script>
import axios from 'axios'
import CHeader from "./CHeader.vue"
import CartItem from "./CCartItem.vue"
export default {
  data(){
        return {
            CartItems: []
        }
  },
  components:{
      "header-glob": CHeader
  },
  mounted() {
      this.getUserCart();
  },
  methods: {
      getUserCart: async function(){
          try {

              const CartItemData = await axios.get("/api/cart");
              console.log(await axios.get("/api/cart"));
              this.CartItems = CartItemData.data;
          }catch(Error){

          }
      }
  },
  components:{
        CartItem
  }
}
</script>