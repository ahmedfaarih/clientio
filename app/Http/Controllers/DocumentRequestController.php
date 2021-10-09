<?php

namespace App\Http\Controllers;

use App\Mail\sendDocumentRequestMail;
use App\Models\DocumentRequest;
use App\Models\Imageable;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class DocumentRequestController extends Controller
{
    public function create()
    {
        $users = User::all();

       /* $documentRequests = DB::table('document_requests')
            ->whereNotNull('request_staus')
            ->latest()->limit(5)->get();
       dd($documentRequests->images);*/
        $images = Imageable::all();
        $documentRequests = DocumentRequest::with('images')->whereNotNull('request_staus')
            ->latest()->limit(5)->get();

        return view('documentRequests.create', compact('users', 'documentRequests','images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required'
        ]);
        /*Find the user to be emailed to*/
        $user = User::find($request->user_id);

        DocumentRequest::create($request->all());
        /*Fills the details for the emails*/
        $details = [
            'title' => $request->title,
            'body' => 'Document request from MN Lawyers'
        ];
        /*Mails to the requested users email with the details*/
        Mail::to($user->email)->send(new sendDocumentRequestMail($details));

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
        $request->validate([
            'file' => 'required',
            'file.*' =>' mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);

        $documentRequest = $request->file('file');
        foreach ($documentRequest as $document){
            $document->move(public_path().'/DocumentRequests/', $document->getClientOriginalName());
            $image = new Imageable();
            $image->file_path = $document->getClientOriginalName();
            $image->imageable_id = $request->imageable_id;
            $image->imageable_type = 'App\\Models\\'.$request->imageable_type;
            $image->save();
        }

       /* $oldRequest = DocumentRequest::find($id);
        $oldRequest->request_staus = 1;
        $oldRequest->save();*/
        return redirect('home');
    }

}
