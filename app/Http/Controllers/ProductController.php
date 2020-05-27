<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages/products/products')->with('products', $products);
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
        $fileName = null;
        dd($request->all());

        $validator = Validator::make($request->all(), [
            'product_picture' => 'max:5000',
//            'product_name' => 'required',
            'details' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'details' => 'required'
//            'customer' => 'required'
        ]);

//        dd($request->all());

        if ($validator->passes()){

            if($request->product_picture != null){
                $dataTime = date('Ymd_His');
                $file = $request->file('product_picture');
//                dd($file);
                $fileName = $dataTime. '-'.rand(00000000, 99999999).'.jpg';
                $savePath = public_path("images");
//                dd($savePath);
                $file->move($savePath, $fileName);
            }

            Product::create([
                'product_name' => $request->product_name,
                'details' => $request->details,
                'customer' => $request->customer,
                'picture' => $fileName
            ]);
            $products = Product::all();
            return view('pages/products/products')->with('products', $products);

        }else{
//            return redirect()->back()->with(['errors' => $validator->errors()->all()]);
            dd($validator->errors()->all());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages/products/view')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return view('pages/products/products')->with('products', Product::all());
    }
}
