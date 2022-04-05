<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrderRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Controller Order's
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index',[
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();

        return view('orders.create', compact('products', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        $data = $request->all();
        strtolower($request->status);
        Order::create($data);

        return redirect()
            ->route('orders.index')
            ->with('message', 'Pedido criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::where('id', $id)->first();
        $order = Order::findOrFail($id);

        if (!$order) {
            return redirect()->route('orders.index');
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::get();
        $products = Product::get();

        return view('orders.edit', compact('order', 'clients', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateOrderRequest $request, $id)
    {
        if (!$order = Order::findOrFail($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $order->update($data);

        return redirect()
            ->route('orders.index')
            ->with('message', 'Pedido Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$order = Order::find($id))
            return redirect()->route('orders.index');

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('message', 'Pedido Deletado com sucesso');
    }
}
