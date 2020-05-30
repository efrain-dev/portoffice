<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\CreateBrandRequest;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');

        $brands = Brand::orderBy('created_at', 'DESC')->name($name)->paginate(2);

        return view('brands.index', compact('brands'));
    }


    public function show(Brand $brand)
    {

        return view('brands.show', [
            'brands' => $brand
        ]);

    }
    public function create(Brand  $brand)
    {
        return view('brands.create',[
            'brand'=> new Brand()

        ]);
    }

    public function store(Request $request)
    {

        $brand = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);
        if ($request->hasFile('file')){
            $file= $request->file('file');
            $name = '/imagenes/'.time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/',$name);

        }
        Brand::create([
        'name'=> request('name'),
        'description'=> request('description'),
        'file'=> $name

        ]);

        return redirect()->route('brands.index')->with('sesion','Marca creada con exito');
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
    public function edit(Brand $brand)
        {

            return view('brands.edit', [
            'brand' => $brand
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Brand $brand,Request $request)

    {

        $brand->update($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        return redirect()->route('brands.show',$brand)->with('sesion','Marca Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand){

        $brand->delete();
        return redirect()->route('brands.index')->with('sesion','Marca Eliminado con exito');;

    }

}
