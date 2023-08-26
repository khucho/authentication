<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
        $products = Product::all();
        return view('products.index',compact('products'));
        }
        else{
            abort(401,"Unathorized");
        }

        // if(Gate::allows('isAdmin'))
        // {
        //     $products = Product::all();
        //     return view('products.index',compact('products')); 
        // }
        // else
        // {
        //     abort(401,"Unathorized");
        // }
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
        //
        $validator =  $this->validate($request,[
            'name' => 'required',
            'description'=>'required',
            'price'=>'required'
       ]);
       $product = Product::create($request->all());
       return back();
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
    public function edit(Product $product)
    {
        
        // if(Gate :: denies ('isAdmin'))
        // {
        //     abort(401,"Unathorized");
        // }
        // else{           
        //     return view('products.edit',['product'=>$product]);
        // }

        if(Gate :: allows ("isManager"))
        {
            return view('products.edit',['product'=>$product]);
        }else if(Gate :: allows ("isAdmin"))
        {
            return view('products.edit',['product'=>$product]);
        }
        else{           
            abort(401,"Unathorized");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        
        if(Gate :: denies ("isAdmin"))
        {
            abort(401,"Unathorized");
        }
        else{           
            $product->delete();
            return redirect()->route('products.index');
        }
    }
}
