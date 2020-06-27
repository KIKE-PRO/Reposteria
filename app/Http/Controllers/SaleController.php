<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Sale;
use App\Client;
use App\Product;
use App\SalesDetails;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="LISTADO DE VENTAS";
        $sales=DB::table('sales')
            ->orderBy('id','DESC')
            ->paginate(5);
        return view('sales.index',compact('title','sales'));
    }

    public function create()
    {
        $clients=Client::all();
        $products=Product::all();
        return view('sales.create',compact('clients'),compact('products'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $sale= new Sale;
        $sale->client_id=$request->client;
        $sale->tipo_comprobante=$request->comprobante;
        $sale->numero_comprobante=$request->numeroComprobante;
        $sale->total=$request->precio_venta*$request->cantidad;
        $sale->save();
        
        $sales_details=new SalesDetails;
        $sales_details->sales_id=$sale->id;
        $sales_details->product_id=$request->product;
        $sales_details->product_qty=$request->cantidad;
        $sales_details->product_price=$request->precio_venta;
        $sales_details->sales_id=$sale->id;


        $sale->save();
        return redirect()->route('products.index');     
    }

    public function show(Product $product)
    {
        return view ('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view ('products.edit',compact('product'));
    }
    public function update(Product $product)
    {
        $data=request()->validate([
            'name'=>'required',
            'description'=>'',
            'priceV'=>'',
            'priceF'=>'',
            'foto'=>'',
        ]);

        $product->update($data);
        return redirect()->route('product.show',['product'=>$product]);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        
        return redirect()->route('sales.index');
    }
}