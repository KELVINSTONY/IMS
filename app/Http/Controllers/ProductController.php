<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::OrderBy('fullName', 'desc')->paginate(10);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $a = request()->validate([
            'fullName' => 'required',
            'emailAddress' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        $a['user_id'] = auth()->id();
        Product::create($a);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');



        // $product = new Product;
        // $product->fullName = $request->fullName;
        // $product->emailAddress = $request->emailAdress;
        // $product->subject = $request->subject;
        // $product->message = $request->message;
        // $product->save();
        return 121;

        // return redirect()->route('products.index')
        //                 ->with('success','product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
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

        $a = request()->validate([
            'fullName' => 'required',
            'emailAddress' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        // $a['user_id']=auth()->id();
        $a = Product::find($id);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
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
}
