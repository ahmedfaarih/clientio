<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Symfony\Component\Console\Input\Input;

class DocumentRequestController extends Controller
{
    public function create()
    {
        $users = User::all();

        $documentRequests =  DB::table('document_requests')
            ->whereNotNull('request_staus')
            ->latest()->limit(5)->get();

        return view('documentRequests.create', compact('users', 'documentRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required'
        ]);

        DocumentRequest::create($request->all());

        return redirect('/documentrequest');

    }

    public function showClientRequests($id)
    {
        /*gets document requests that has no uploads*/
        $clientRequests = DB::table('document_requests')
            ->where('user_id', $id)
            ->whereNull('request_staus')
            ->get();
        return view('documentRequests.clientRequests', compact('clientRequests'));
    }

    public function updateDocumentRequest(Request $request, $id)
    {
        $documentRequest = DocumentRequest::find($id);

        $request->validate([
            'file_path' => 'required|mimes:csv,txt,xlx,xls,pdf|max:4048',
        ]);

        if( $request->file('file_path'))
        {
            $request->file('file_path')->move(public_path('DocumentRequests/'), $request->file('file_path')->getClientOriginalName());
            $file_path =$request->file('file_path')->getClientOriginalName();
           /* $file_path = 'DocumentRequests/' . $request->file('file_path')->getClientOriginalName();*/
            $data=array(
                'file_path' => $file_path,
                'request_staus' => 1
            );
            $documentRequest->update($data);
        }
        return redirect('home');


        /*$input = $request->all();

        if ($file = $request->file('file')) {
            $destinationPath = 'DocumentRequests/';
            $uploadedRequest = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $uploadedRequest);
            $input['file'] = "$uploadedRequest";
        }*/



    }
}
