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
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create', [
            'clients' => Client::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(StoreUpdateClientRequest $request)
    {
        $data = $request->all();
        Client::create($data);

        return redirect()
            ->route('clients.index')
            ->with('message', 'Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $id
     */
    public function edit($id)
    {
        if (!$client = Client::find($id)) {
            return redirect()->back();
        }
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(StoreUpdateClientRequest $request, $id)
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $id
     */
    public function destroy($id)
    {
        if (!$client = Client::find($id))
            return redirect()->route('posts.index');

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('message', 'Cliente Deletado com sucesso');
    }
}
