<?php

namespace App\Http\Controllers;

use App\Models\project_updates;
use App\Models\Projects;
use Illuminate\Http\Request;
use DB;
use  RealRashid\SweetAlert\SweetAlertServiceProvider ;

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
        alert('Success', 'Update added !');
        return redirect('projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $updates = DB::table('project_updates')->where('user_id', $id)->latest()->get();
        return view('clientView.update', compact('updates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $update = project_updates::find($id);
        return view('updates.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $update = project_updates::find($id);
        $this->validate($request,[
            'date'=>'required',
            'remarks'=>'required',

        ]);
        $update->update($request->all());
        alert('Success', 'Update edited successfully  ');
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_updates  $project_updates
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $update = project_updates::findorfail($id);
        $update->delete();

        return redirect('/projects');
    }

    public function showUpdateOsfOneproject($id){

        $projectUpdate = project_updates::find($id);
        return view('updates.index',compact('projectUpdate'));
    }
}
