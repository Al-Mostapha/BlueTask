<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getView()
    {
        return view("cart");
    }

    public function index()
    {
        $CartItems = DB::table('shop_charts')
                ->join('shop_cart_items', 'shop_charts.id', '=', 'shop_cart_items.chart_id')
                ->join('products', 'shop_cart_items.product_id', '=', 'products.id')
                ->select(DB::raw("`products`.*, `shop_cart_items`.id as item_id"))
                ->where("shop_charts.user_id", \Auth::user()->id)
                ->get();
        return response()->json($CartItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

       
        $request->validate([
            'product_id' => 'required|numeric|exists:products,id',
        ]);
        $newCart = new CartItems([
            'chart_id' => $request->user()->cart->id,
            'product_id' => $request->get('product_id'),
            'product_count' => 1,
          ]);
      
          $newCart->save();
      
          return response()->json($newCart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CartItem = CartItems::find($id);

        if(!$CartItem)
            return response()->json([
                "status" => "error"
            ]);

        $CartItem->delete();
        return response()->json([
            "status" => "ok"
        ]);
    }
}
