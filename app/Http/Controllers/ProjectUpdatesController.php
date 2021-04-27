<?php

namespace App\Http\Controllers;

use App\Models\project_updates;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $updates = project_updates::findorFail($id);
        return view('user.index', compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $projects = Projects::all();
         return view('updates.create' ,compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date'=>'date',
            'remarks'=>'required',
            'project_id'=>'required',
        ]);
        project_updates::create($request->all());
        return view('adminHome');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function show(project_updates $project_updates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function edit(project_updates $project_updates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project_updates $project_updates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function destroy(project_updates $project_updates)
    {
        //
    }

    public function showUpdateOsfOneproject($id){

        $projectUpdate = project_updates::find($id);
       return view('updates.index',compact('projectUpdate'));
    }
}
