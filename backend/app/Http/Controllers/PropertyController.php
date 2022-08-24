<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();

        return view("pages.property.index", compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyTypes = PropertyType::all();
        $agents = Agent::all();
        $cities = City::all();

        return view("pages.property.create",compact('cities','propertyTypes','agents'));
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
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required',
            'status' => 'required|string',
            'rooms' => 'required|integer',
            'address' => 'required|string',
            'property_type_id' => 'required|integer',
            'agent_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);

        $property = $request->except('_token');

        if(!Property::create($property))
            return redirect()->back()->withInput();


        return redirect()->route("property.create")->with('status',"Property has been created successfully");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $propertyTypes = PropertyType::all();
        $agents = Agent::all();
        $cities = City::all();


        return view("pages.property.edit", compact('property','propertyTypes','agents','cities'));
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
        $property = Property::find($request->id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required',
            'status' => 'required|string',
            'rooms' => 'required|integer',
            'address' => 'required|string',
            'property_type_id' => 'required|integer',
            'agent_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);

        $data = $request->except('_token');



        if(!$property->update($data))
            return redirect()->back()->withInput();


        return redirect()->route("property.edit",$request->id)->with('status',"Property has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);

        if(!$property->delete())
            return redirect()->back();

        return redirect()->route("property.index")->with('status',"Property has been Deleted successfully");
    }
}
