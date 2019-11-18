<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home', ['clients' => Client::paginate(15)]);
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function show(Client $client)
    {
        return view('client', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @param Client $client
     * @return void
     */
    public function update(ClientRequest $request, Client $client)
    {
        $clientData = $request->all();
        $client->update($clientData);
        return view('client', ['client' => $client, 'updateResult'=>true]);

    }
}
