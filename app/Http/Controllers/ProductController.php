<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'clients' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('message', 'Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->back();
        }

        return view('products.edit', [
            'clients' => Client::get(),
            'product' => $product
        ]);
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
        if (!$product = Product::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('message', 'Produto Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$product= Product::find($id))
            return redirect()->route('products.index');

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('message', 'Client Deletado com sucesso');
    }
}
