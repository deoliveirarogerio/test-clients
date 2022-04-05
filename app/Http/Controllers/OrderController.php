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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('orders.index',[
            'orders' => Order::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();

        return view('orders.create', compact('products', 'clients'));
    }

    /**
     * @param StoreUpdateOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        $data = $request->all();
        Order::create($data);

        return redirect()
            ->route('orders.index')
            ->with('message', 'Pedido criado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(int $id)
    {
        // $post = Post::where('id', $id)->first();
        $order = Order::findOrFail($id);

        if (!$order) {
            return redirect()->route('orders.index');
        }

        return view('orders.show', compact('order'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::get();
        $products = Product::get();

        return view('orders.edit', compact('order', 'clients', 'products'));
    }

    /**
     * @param StoreUpdateOrderRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateOrderRequest $request, int $id)
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
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        if (!$order = Order::find($id))
            return redirect()->route('orders.index');

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('message', 'Pedido Deletado com sucesso');
    }
}
