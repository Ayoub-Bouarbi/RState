<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();

        return view("pages.agent.index", compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.agent.create");
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
            'email' => 'required|string|email',
            'address' => 'required|string',
            'phoneNumber' => 'required|string'
        ]);

        $agent = $request->except('_token');

        if(!Agent::create($agent))
            return redirect()->back()->withInput();


        return redirect()->route("agent.create")->with('status',"Agent has been created successfully");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);

        return view("pages.agent.edit", compact('agent'));
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
        $agent = Agent::find($request->id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'address' => 'required|string',
            'phoneNumber' => 'required|string'
        ]);


        $data = $request->except('_token');

        if(!$agent->update($data))
            return redirect()->back()->withInput();


        return redirect()->route("agent.edit",$request->id)->with('status',"Agent has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);

        if(!$agent->delete())
            return redirect()->back();

        return redirect()->route("agent.index")->with('status',"Agent has been Deleted successfully");
    }
}
