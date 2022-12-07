<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEigenRequest;
use App\Http\Requests\UpdateEigenRequest;
use App\Models\Eigen;

class EigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEigenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEigenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eigen  $eigen
     * @return \Illuminate\Http\Response
     */
    public function show(Eigen $eigen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eigen  $eigen
     * @return \Illuminate\Http\Response
     */
    public function edit(Eigen $eigen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEigenRequest  $request
     * @param  \App\Models\Eigen  $eigen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEigenRequest $request, Eigen $eigen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eigen  $eigen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eigen $eigen)
    {
        //
    }
}
