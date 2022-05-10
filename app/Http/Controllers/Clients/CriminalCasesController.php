<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\CriminalCases;
use Illuminate\Http\Request;

class CriminalCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.criminal_cases.index');
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
     * @param  \App\Models\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function show(CriminalCases $criminalCases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function edit(CriminalCases $criminalCases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriminalCases $criminalCases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriminalCases $criminalCases)
    {
        //
    }
}
