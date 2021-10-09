<?php

namespace App\Http\Controllers;

use App\Models\project_updates;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $updates = DB::table('project_updates')->where('user_id', $id)->get();
        return view('clientView.update', compact( 'user','updates'));
    }

    public function clientDetails(user $id)
    {
        $projects = Projects::all();
         return view('clientView.details', compact('projects'));
    }


}
