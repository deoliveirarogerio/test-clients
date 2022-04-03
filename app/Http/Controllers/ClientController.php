<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
            ->with('message', 'Client Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$client = Post::find($id))
            return redirect()->route('posts.index');

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('message', 'Client Deletado com sucesso');
    }
}
