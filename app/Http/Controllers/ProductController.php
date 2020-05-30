<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $name = $request->get('name');
        $brand = $request->get('brand');

        $products = Product::orderBy('created_at', 'DESC')->name($name)->brand($brand)->paginate(4);
        return view('products.index', compact('products'));
    }


    public function show(Product $product)
    {

        return view('products.show', [
            'product' => $product
        ]);

    }
    public function create(Product  $product, Brand $brand)
    {
            $brand  = Brand::all();
            return view('products.create',[
            'brand' => $brand,
            'product'=> new Product()

        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'id_brand'=> 'required',
            'price'=> 'required',
            'file' => 'required',

        ]);
        if ($request->hasFile('file')){
            $file= $request->file('file');
            $name = '/imagenes/'.time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/',$name);

        }
        Product::create([
            'name'=> request('name'),
            'quantity'=> request('quantity'),
            'price'=> request('price'),
            'id_brand'=> request('id_brand'),
            'file'=> $name

        ]);

        return redirect()->route('products.index')->with('sesion','Producto  creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {

        return view('products.edit', [
            'product' => $product
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request)

    {

        $product->update($request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'price',
        ]));

        return redirect()->route('products.show',$product)->with('sesion','Producto Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('products.index')->with('sesion','Producto Eliminado con exito');;

    }
}
