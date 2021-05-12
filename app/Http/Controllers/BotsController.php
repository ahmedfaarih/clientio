<?php

namespace App\Http\Controllers;

use App\Models\Bots;
use Illuminate\Http\Request;

class BotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bots = Bots::latest()->paginate(5);

        return view('website.bots.index',compact('bots'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.bots.create');
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
            'name' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Bots::create($input);

        return redirect()->route('Bots.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function show(Bots $bots)
    {
        return view('website.bots.show',compact('bots'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function edit(Bots $bots)
    {
        return view('website.bots.edit',compact('bots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $bots = Bots::find($id);
        $bots->update($input);

        return redirect()->route('Bots.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bots $bots)
    {
        $bots->delete();

        return redirect()->route('Bots.index')
            ->with('success','Product deleted successfully');
    }
}
