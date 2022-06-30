<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use Illuminate\Http\Request;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentions = Attention::paginate(5);

        return response()->json([
            'attentions' => $attentions,
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
        $attention = Attention::create($request->all());

        return response()->json([
            'attention' => $attention,
            'status' => 'success',
            'message' => 'Attention successfully stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function show(Attention $attention)
    {
        return response()->json([
            'attention' => $attention,
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function edit(Attention $attention)
    {
        return response()->json([
            'attention' => $attention,
            'status' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attention $attention)
    {
        $attention->update($request->all());

        return response()->json([
            'attention' => $attention,
            'status' => 'success',
            'message' => 'Attention successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attention $attention)
    {
        $attention->delete();

        $attentions = Attention::paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => 'Attention successfully remove',
            'attentions' => $attentions,
        ]);
    }
}
