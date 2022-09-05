<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Requisite;
use Illuminate\Http\Request;

class RequisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisites = Requisite::where('id', 1)->first();
        return  view('admin.requisites.index', compact('requisites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisite  $requisite
     * @return \Illuminate\Http\Response
     */
    public function show(Requisite $requisite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisite  $requisite
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisite $requisite)
    {
        return  view('admin.requisites.edit', compact('requisite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisite  $requisite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisite $requisite)
    {
        $parameters = $request->all();

        $requisite->update($parameters);

        return redirect()->route('requisites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisite  $requisite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisite $requisite)
    {
        //
    }
}
