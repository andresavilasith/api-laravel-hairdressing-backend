<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use App\Models\Client;
use App\Models\Date;
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
        $clients = Client::paginate(5);

        return response()->json([
            'clients' => $clients,
            'status' => 'success'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'status' => 'success'
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
        $client = Client::create($request->all());

        return response()->json([
            'client' => $client,
            'status' => 'success',
            'message' => 'Client successfully stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json([
            'client' => $client,
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return response()->json([
            'client' => $client,
            'status' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return response()->json([
            'client' => $client,
            'status' => 'success',
            'message' => 'Client successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        $clients = Client::paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => 'Client successfully remove',
            'clients' => $clients,
        ]);
    }

    public function clients_with_dates()
    {
        $clients_with_dates = Client::with('dates')->get();
      

        return response()->json([
            'clients_with_dates' => $clients_with_dates,
            'status' => 'success'
        ]);
    }
    public function dates_with_attentions()
    {
        $dates_with_attentions = Date::with('attentions')->get();
      

        return response()->json([
            'dates_with_attentions' => $dates_with_attentions,
            'status' => 'success'
        ]);
    }
}
