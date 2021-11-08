<?php

namespace App\Http\Controllers;
use App\Models\project_updates;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use redirect;
use  RealRashid\SweetAlert\SweetAlertServiceProvider ;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $projects = Projects::paginate(20);
        return view('projects.index', compact('projects'), compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= DB ::table('users')->where('type','GOUSER')->get();
        return view('projects.create', compact('users'));
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
            'user_id'=>'required',
            'title'=>'required',
            'type'=>'required',
            'description' =>'required'
            ]);

        Projects::create($request->all());
        alert('Success', 'Created successfully');
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $updates = project_updates::all();
        $users = User::all();
        $project = Projects::findorFail($id);
        return view('projects.show', compact('project', 'users','updates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users= DB ::table('users')->where('type','GOUSER')->get();
        $project = Projects::findorFail($id);
        return view('projects.edit',compact('users'), compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Projects::findorfail($id);
        $this->validate($request,[
            'user_id'=>'required',
            'title'=>'required',
            'type'=>'required',
            'description' =>'required'
        ]);
        $project->update($request->all());
        alert('Success', 'Updated successfully');
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::findorfail($id);
        $project->delete();
        alert('Success', 'Project deleted successfully');

        return redirect('/projects');

    }
}
