<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Controller Products
 */
class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param StoreUpdateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->all();
        Product::create($data);
//        dd($data);
        return redirect()
            ->route('products.index')
            ->with('message', 'Produto criado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->back();
        }

        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * @param StoreUpdateProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateProductRequest $request, int $id)
    {
        if (!$product = Product::findOrFail($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('message', 'Produto Atualizado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        if (!$product= Product::find($id))
            return redirect()->route('products.index');

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('message', 'Produto Deletado com sucesso');
    }
}
