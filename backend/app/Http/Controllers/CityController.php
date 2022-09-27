<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        return view("pages.city.index", compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view("pages.city.create",compact('countries'));
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
            'country_id' => 'required|integer',
        ]);

        $city = $request->except('_token');

        if(!City::create($city))
            return redirect()->back()->withInput();


        return redirect()->route("city.create")->with('status',"City has been created successfully");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $countries = Country::all();

        return view("pages.city.edit", compact('city','countries'));
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
        $city = City::find($request->id);

        $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|integer'
        ]);

        $data = $request->except('_token');


        if(!$city->update($data))
            return redirect()->back()->withInput();


        return redirect()->route("city.edit",$request->id)->with('status',"City has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        if(!$city->delete())
            return redirect()->back();

        return redirect()->route("city.index")->with('status',"City has been Deleted successfully");
    }
}
