<?php

namespace App\Http\Controllers;

use App\Models\LegalBits;
use Illuminate\Http\Request;

class LegalBitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalBits = LegalBits::all();
        return view('website.legalBits.index', compact('legalBits'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.legalBits.create');
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
            'title'=>'required',
            'link'=>'required',

        ]);

        LegalBits::create($request->all());

        return redirect('/legalBits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegalBits  $legalBits
     * @return \Illuminate\Http\Response
     */
    public function show(LegalBits $legalBits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegalBits  $legalBits
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalBits $legalBits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegalBits  $legalBits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LegalBits $legalBits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegalBits  $legalBits
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $legalBits = LegalBits::findorfail($id);
        $legalBits->delete();

        return redirect('/legalBits');
    }
}
