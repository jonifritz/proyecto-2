<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = New Match();
        
        $match->quarters = $request->quarters;
        $match->semis = $request->semis;
        $match->finals = $request->finals;
        $match->champion = $request->champion;
        $match->prediction_id = $request->prediction_id;

        if ($match->save()) {
            return response()->json($match, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return $match;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Prediction::find($id);

        $match->name = $request->name;
        $match->round = $request->round;
        $match->prediction_id = $request->prediction_id;
        $match->team_a = $request->team_a;
        $match->team_b = $request->team_b;
        $match->goals_a = $request->goals_a;
        $match->goals_b = $request->goals_b;

        if ($match->save()) {
            return response()->json($match, 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        if (Match::where('id', $match)->delete()) {
            return response()->json(null, 204);
        }
    }
}
