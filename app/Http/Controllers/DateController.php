<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Date::paginate(5);

        return response()->json([
            'dates' => $dates,
            'status'=>'success'
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
        $date = Date::create($request->all());

        return response()->json([
            'date' => $date,
            'status' => 'success',
            'message' => 'Date successfully stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        return response()->json([
            'date' => $date,
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {
        return response()->json([
            'date' => $date,
            'status' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        $date->update($request->all());

        return response()->json([
            'date' => $date,
            'status' => 'success',
            'message' => 'Date successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        $date->delete();

        $dates = Date::paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => 'Date successfully remove',
            'dates' => $dates,
        ]);
    }
}
