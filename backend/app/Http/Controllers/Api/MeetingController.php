<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api');
    }

    protected function set_meeting(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'place' => 'required|string',
            'agent_id' => 'required|integer',
            'user_id' => 'required|integer',
            'property_id' => 'required|integer',
        ]);

        if(Meeting::create($request->all()))
            return response()->json([
                'status' => 'SUCCESS'
            ]);

        return response()->json([
            'status' => 'FAILED'
        ]);
    }
    

    protected function meetings_by_user($id)
    {
        $meetings = Meeting::where('user_id',"=",$id)->get();

        return response()->json([
            'status' => 'OK',
            'meetings' => $meetings
        ]);
    }
}
