<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return Product::with('category')->get();
     
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required|string|unique:products',
            'price_buy'     => 'required',
            'price_sold'    => 'required',
            'category_id'   => 'required|exists:categories,id', 
            ]);
    
            if ($validator->fails()) {    
                return getError();
            }
    
            $product = Product::create([
                'name' => $request->name,
                'price_buy'     => $request->price_buy,
                'price_sold'    => $request->price_sold,
                'category_id'   => $request->category_id,
                'status'        => 1
            ]);
    
            $product = Product::create($request->all());
            return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    { 

        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'price_buy'     => 'required',
            'price_sold'    => 'required',
            'category_id'   => 'required|exists:categories,id', 
            'status'        => 'required'
            ]);

            if ($validator->fails()) {    
                return getError();
    
            }
                
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        return Product::destroy($id);

    }
}
