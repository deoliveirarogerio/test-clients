<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;
use App\Models\Product;

/**
 * Controller Client's
 */
class ClientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::all(),
        ]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('clients.create', [
            'clients' => Client::all(),
        ]);
    }

    /**
     * @param StoreUpdateClientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(StoreUpdateClientRequest $request)
    {
        $data = $request->all();
        Client::create($data);

        return redirect()
            ->route('clients.index')
            ->with('message', 'Cliente criado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id)
    {
        if (!$client = Client::find($id)) {
            return redirect()->back();
        }
        return view('clients.edit', compact('client'));
    }

    /**
     * @param StoreUpdateClientRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateClientRequest $request, int $id)
    {
        if (!$client = Client::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $client->update($data);

        return redirect()
            ->route('clients.index')
            ->with('message', 'Cliente Atualizado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        if (!$client = Client::find($id))
            return redirect()->route('posts.index');

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('message', 'Cliente Deletado com sucesso');
    }
}
