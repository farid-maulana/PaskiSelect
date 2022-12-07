<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationDetailRequest;
use App\Http\Requests\UpdateEvaluationDetailRequest;
use App\Models\EvaluationDetail;

class EvaluationDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreEvaluationDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluationDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvaluationDetail  $evaluationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(EvaluationDetail $evaluationDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvaluationDetail  $evaluationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluationDetail $evaluationDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluationDetailRequest  $request
     * @param  \App\Models\EvaluationDetail  $evaluationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluationDetailRequest $request, EvaluationDetail $evaluationDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluationDetail  $evaluationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvaluationDetail $evaluationDetail)
    {
        //
    }
}
