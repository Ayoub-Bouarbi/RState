<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTypes = PropertyType::all();

        return view("pages.propertyType.index", compact('propertyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.propertyType.create");
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
            'name' => 'required|string'
        ]);

        $propertyType = $request->except('_token');

        if(!PropertyType::create($propertyType))
            return redirect()->back()->withInput();


        return redirect()->route("propertyType.create")->with('status',"Property Type has been created successfully");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propertyType = PropertyType::find($id);

        return view("pages.propertyType.edit", compact('propertyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $propertyType = PropertyType::find($request->id);

        $request->validate([
            'name' => 'required|string'
        ]);

        $data = $request->except('_token');


        if(!$propertyType->update($data))
            return redirect()->back()->withInput();


        return redirect()->route("propertyType.edit",$request->id)->with('status',"Property Type has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyType = PropertyType::find($id);

        if(!$propertyType->delete())
            return redirect()->back();

        return redirect()->route("propertyType.index")->with('status',"Property Type has been Deleted successfully");
    }
}
