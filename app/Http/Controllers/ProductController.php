<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Session;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title="LISTADO DE PRODUCTOS";
        $products=DB::table('products')
            ->orderBy('id','DESC')
            ->paginate(5);
        return view('products.index',compact('title','products'));
    }

    public function create()
    {
        return view ('products.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $post=Product::create($request->all());
        if($request->hasfile('foto'))
        {
           $file=$request->file('foto')->store('uploads','public');
            $post->foto=$file;
            $post->save();
        }
        else
        {
            $file=$request->file('foto');
            $name="uploads/sinFoto.jpeg";
            $post->foto=$name;
            $post->save();
        }   
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
    public function update(Request $request, $id)
    {
        $product = Product::findOrfail($id);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->priceV=$request->priceV;
        $product->priceF=$request->priceF;

        if ($request->foto) 
        {  
            if($request->foto="sinFoto.jpeg")
            {
                $file=$request->file('foto')->store('uploads','public');
                $product->foto=$file;
            }
            else
             {
                Storage::delete('public/'.$product->foto);
                $file=$request->file('foto')->store('uploads','public');
                $product->foto=$file;
             }   
        }
       // dd($request->all());
        $product->save();
        Session::flash('message',"Producto actualizado correctamente");
        return redirect()->route('product.show',['product'=>$product]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
