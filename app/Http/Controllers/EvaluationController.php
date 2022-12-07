<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Candidate;
use App\Models\Criteria;
use App\Models\CriteriaEigen;
use App\Models\Eigen;
use App\Models\Evaluation;
use App\Models\EvaluationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        $criterias = Criteria::all();
        $evaluations = EvaluationDetail::with('evaluation.candidate', 'criteria')->get();
        return view('evaluations.index', compact('candidates', 'criterias', 'evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::all();
        $criterias = Criteria::all();
        $criterias_count = Criteria::count();
        return view('evaluations.create', compact('candidates', 'criterias', 'criterias_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Clear table
        DB::statement("SET foreign_key_checks=0");
        Eigen::truncate();
        CriteriaEigen::truncate();
        EvaluationDetail::truncate();
        Evaluation::truncate();
        DB::statement("SET foreign_key_checks=1");
        
        // Insert data
        foreach ($request->score as $index => $criteria) 
        {
            // Insert to table evaluations
            $evaluation = Evaluation::create([
                'candidate_id' => $index,
            ]);

            foreach ($criteria as $key => $score) 
            {
                // Insert to table evaluation_details
                EvaluationDetail::create([
                    'evaluation_id' => $evaluation->id,
                    'criteria_id' => $key,
                    'score' => $score[0],
                ]);
            }
        }

        $criterias = Criteria::all();
        $alternative_eigens = array();
        $criteria_eigens = array();
        
        foreach ($criterias as $criteria) 
        {
            $evaluations = EvaluationDetail::with('evaluation.candidate')->where('criteria_id', $criteria->id)->get();
            foreach ($evaluations as $column) 
            {
                // Get total nilai every alternative
                $total = 0;
                foreach ($evaluations as $row) 
                {
                    $total += $row->score / $column->score;
                }

                // Get eigen score
                $eigen = 0;
                foreach ($evaluations as $eigens) 
                {
                    $eigen = ($eigens->score / $column->score) / $total;
                    $alternative_eigens[$criteria->id][$eigens->evaluation->candidate_id] = $eigen;
                }

                // Get criteria total
                $criteria_total = 0;
                foreach($criterias as $criteria_sum) 
                {
                    $criteria_total += $criteria->weight / $criteria_sum->weight;
                }

                // Get criteria eigen
                $criteria_eigen = 0;
                foreach($criterias as $criteria_avg) 
                {
                    $criteria_eigen = ($criteria->weight / $criteria_avg->weight) / $criteria_total;
                    $criteria_eigens[$criteria_avg->id] = $criteria_eigen;
                }
            }
        }

        // Save eigen score every alternative
        foreach ($alternative_eigens as $index => $alt)
        {
            foreach ($alt as $key => $eigen) 
            {
                Eigen::create([
                    'criteria_id' => $index,
                    'candidate_id' => $key,
                    'eigen' => $eigen,
                ]);
            }
        }

        // Save eigen score every criteria
        foreach ($criteria_eigens as $index => $crt)
        {
            CriteriaEigen::create([
                'criteria_id' => $index,
                'eigen' => $crt,
            ]);
        }

        return redirect()->route('evaluations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluationRequest  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
