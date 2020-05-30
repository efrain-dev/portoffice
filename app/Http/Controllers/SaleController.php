<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Product;
use App\Sale;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $sales = Sale::orderBy('created_at', 'DESC')->name($name)->paginate(8);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $sales, Request $request)
    {

        $name = $request->get('name');
        $products = Product::orderBy('quantity', 'DESC')->name($name)->get();
        $idFactura = $request->session()->get('idFactura');
        if ($idFactura==null||''){
            $sale =Sale::create([
                'name' => 'CF',
                'address' => 'Guatemala',
            ]);
            $details = Detail::orderBy('created_at')->where('id_sales',$sale->id)->get();

            return view('sales.create',[
                'sales'=> $sale,
                'products'=> $products,
                'details' => $details,
            ]);
        }else{
            $details = Detail::orderBy('created_at')->where('id_sales',$idFactura)->get();
            $sale =Sale::where('id', $idFactura)->first();;
            return view('sales.create',[
                'sales'=> $sale,
                'products'=> $products,
                'details' => $details,

            ]);

        }



    }
    public function create_pdf(Request $request ,$id){
        $details = Detail::orderBy('created_at')->where('id_sales',$id)->get();
        $sale =Sale::where('id', $id)->first();
        return view('sales.factura.viewFact',[
                'sales'=> $sale,
                'details' => $details,
            ]);





    }
    public function show_factura(Request $request ,$id){
        $details = Detail::orderBy('created_at')->where('id_sales',$id)->get();
        $sale =Sale::where('id', $id)->first();
        return view('sales.factura.showFact',[
            'sales'=> $sale,
            'details' => $details,
        ]);





    }

    public function download_pdf(Request $request ,$id){
        $details = Detail::orderBy('created_at')->where('id_sales',$id)->get();
        $sale =Sale::where('id', $id)->first();

        $pdf= PDF::loadView('sales.factura.pdf',['sales'=> $sale, 'details' => $details,])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);;
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download();
    }
    public function store_product(Request $request, Detail $detail, Product $product)
    {
        $request ->validate([
            'id_product' =>  'required',
            'quantity' => 'required',

        ]);
         $idFactura = $request->session()->get('idFactura');
         $product_id = Request('id_product');
         $product= Product::where('id', $product_id)->first();
         $sale= Sale::where('id', $idFactura)->first();

        $test = $product->quantity - Request('quantity');
         if ($test>=0){
             $price = $product->price;
             $subtotal = Request('quantity') * $price;
             $subtotalF = $sale->total + $subtotal;
             $quantity = $sale->quantity + Request('quantity');

             Detail::create([
                 'id_sales' => $idFactura,
                 'id_product' =>  Request('id_product'),
                 'quantity' => Request('quantity'),
                 'subtotal' => $subtotal,
             ]);
             Product::where('id', $product_id)->update(['quantity' => $test]);
             Sale::where('id', $idFactura)->update(['total' => $subtotalF,'quantity'=>$quantity]);

             return redirect()->route('sales.create')->with('sesion','Producto  agregado con exito');
         }else{
             return redirect()->route('sales.create')->with('sesionB','Ah ocurrido un error probablemente no haya stock');
         }


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
        $request ->validate([
            'name' =>  'required',
            'address' => 'required',

        ]);
        Sale::where('id', $id)->update(['name' => $request->name, 'address'=> $request->address]);
        return redirect()->route('sales.create')->with('sesion','Datos de facturacion actualizados con exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {


        $sale->delete();
        return redirect()->route('sales.index')->with('sesion','Factura eliminada con exito');


    }
    public function cancel(Request $request, $id){
          $sale=Sale::where('id', $id)->first();
          $details=Detail::where('id_sales', $sale->id)->get();
          foreach ( $details as $detail){
              $product=Product::where('id', $detail->id_product)->first();
              $quantityProduct=$product->quantity;
              $quantityDetail=$detail->quantity;
              $quantity=$quantityProduct+$quantityDetail;
              Product::where('id', $detail->id_product)->update(['quantity' => $quantity]);
          }
        Sale::destroy($id);
        Detail::destroy($id);
        session()->forget('idFactura');
        return redirect()->route('sales.index')->with('sesion','Factura cancelada con exito');
    }
    public function delete_detail(Request $request, $id){
        $detail=Detail::where('id', $id)->first();
        $sale=Sale::where('id', $detail->id_sales)->first();
        $product=Product::where('id', $detail->id_product)->first();
        $quantityProduct=$detail->quantity;
        $quantityDetail=$product->quantity;
        $quantity=$quantityProduct+$quantityDetail;
        Product::where('id', $detail->id_product)->update(['quantity' => $quantity]);
        $quantitySale = $sale->quantity;
        $quantity = $quantitySale - $quantityDetail;
        $totalF= $sale->total;
        $subtotal = $detail->subtotal;
        $total = $totalF-$subtotal;
        Sale::where('id', $detail->id_sales)->update(['total' => $total,'quantity'=>$quantity]);
        Detail::destroy($id);
        return redirect()->route('sales.create')->with('sesion','Elemento eliminado con exito');

    }
    public function terminar(Request $request, $id){

        session()->forget('idFactura');
        return redirect()->route('sales.index')->with('sesion','Factura terminada con exito');

    }



}
