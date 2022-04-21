<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductReq;
use App\Models\User;
use App\Models\Product;
use App\Http\Traits\ProductTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ProductTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(Product::all());;
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
    public function store(StoreProductReq $request)
    {
        //

        $ValidPar = $request->validated();
        $ImageName = $this->saveImage($ValidPar["product_image"], 'images/products');
        $Product = Product::create([
            "product_name" => $ValidPar["product_name"],
            "product_desc" => $ValidPar["product_desc"],
            "product_cat" => $ValidPar["product_cat"],
            "product_price" => $ValidPar["product_price"],
            "product_sale" => $ValidPar["product_sale"],
            "product_image" => $ImageName

        ]);
        return response()->json($ValidPar);
    }

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
        //
    }

    function saveImage($photo, $folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }


}
