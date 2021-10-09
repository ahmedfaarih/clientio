<?php

namespace App\Http\Controllers;

use App\Models\Publications;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publications::all();
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required'
        ]);

        $input = $request->all();
        if ($image = $request->file('img')) {
            $destinationPath = 'publicationImg/';
            $publicationImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $publicationImage);
            $input['img'] = "$publicationImage";
        }
        Publications::create($input);

        return redirect()->route('publications.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publications::find($id);
        return view('publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publications::findorfail($id);
        return (view('publications.edit', compact('publication')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $publication = Publications::find($id);
        $this->validate($request,[
            'user_id'=> 'required',
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('img')) {
            $destinationPath = 'publicationImg/';
            $publicationImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $publicationImage);
            $input['img'] = "$publicationImage";
        }else{
            unset($input['img']);
        }

        $publication->update($input);

        return redirect()->route('publications.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publications::findorfail($id);
        $publication->delete();

        return redirect(route('publications.index'));

    }
}
