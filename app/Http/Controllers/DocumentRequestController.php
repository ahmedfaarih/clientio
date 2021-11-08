<?php

namespace App\Http\Controllers;

use App\Mail\sendDocumentRequestMail;
use App\Models\DocumentRequest;
use App\Models\Imageable;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class DocumentRequestController extends Controller
{
    public function create()
    {
        $users= DB ::table('users')->where('type','GOUSER')->get();

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
        alert('Success', 'Request sent successfully to '.$user->name );
        return redirect('/documentrequest');


    }

    public function showClientRequests($id)
    {
        /*gets document requests that has no uploads*/
        $clientRequests = DB::table('document_requests')
            ->where('user_id', $id)
            ->whereNull('request_staus')
            ->latest()
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
            $image->imageable_id = $request->id;
            $image->imageable_type = 'App\\Models\\DocumentRequests';
            $image->save();
        }

       $oldRequest = DocumentRequest::find($id);
        $oldRequest->request_staus = 1;
        $oldRequest->save();
        alert('Success', 'Uploaded sent successfully |Thank you!');
        return redirect('home');
    }

}
