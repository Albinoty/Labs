<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Http\Requests\TeamRequest;

class TeamsController extends Controller
{
    public static function storageFile(TeamRequest $request, $team){
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->store(env('IMG_DIR'));
            $team->image = $filename;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('admin.teamsIndex',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();

        return view('admin.teamCreate',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = new Team();

        $team->nom = $request->input('nom');
        $team->fonction = $request->input('fonction');
        $team->teamleader = $request->input('teamleader');

        // dd($team);

        $this->storageFile($request, $team);

        $team->save();
        
        return redirect(route('teams.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $team = $team::find($team->id);

        return view('admin.teamEdit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team = $team::find($team->id);

        $team->nom = $request->input('nom');
        $team->fonction = $request->input('fonction');
        
        if($request->hasfile('image') != null){
            Storage::delete($team->image);
            $this->storageFile($request, $team);
        }



        if($request->input('teamleader') == "Oui"){
            // Idem mais reconnait pas le update ...
            // $oldTeamLeader = Team::all();
            // $oldTeamLeader->where('teamleader','=','Oui');
            // $oldTeamLeader->update(['teamleader' => 'Non']);

            DB::table('teams')
            ->where('teamleader','=','Oui')
            ->update(['teamleader' => 'Non']);
        }

        $team->teamleader = $request->input('teamleader');

        $team->save();
        
        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {

        Storage::delete($team->photo);
        $team::find($team->id)->delete();

        return redirect(route('teams.index'));
    }
}
