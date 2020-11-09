<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stage;
use App\Events\StageMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
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

        $stage = new Stage;
        $stage->user_id = Auth::user()->id;
        $stage->background = $request->background;
        $stage->stage_type = $request->stage_type;
        $stage->displayable = $request->displayable;
        $stage->save();

        $user = User::where('id', Auth::user()->id)->first();
        $user->current_session = $stage->hash;
        $user->save();

        $data['stage'] = $stage;
        $data['user'] = $user;

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage, Request $request)
    {

        $stage_session = Stage::where('id', $stage->id)->first();

        return view('stage', compact(['stage_session']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Stage $stage, Request $request)
    {
        $stage = Stage::where('id', $stage->id)->first();
        $stage->user_id = $request->user_id;
        $stage->background = $request->background;
        $stage->stage_type = $request->stage_type;
        $stage->displayable = $request->displayable;
        $stage->save();

        event(new StageMessage($stage));

        return $stage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage, Request $request)
    {
        $stage = Stage::where('id', $stage->id)->delete();

        $user = User::where('id', Auth::user()->id)->first();
        $user->current_session = null;
        $user->save();

        return $user;
    }
}
