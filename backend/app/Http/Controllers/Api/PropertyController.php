<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    function __construct()
    {
        // $this->middleware('auth:api');
    }

    protected function properties()
    {
        $properties = Property::all();


        return response()->json([
            'status' => 'OK',
            'data' => $properties
        ]);
    }
    protected function propertyDetails($slug)
    {
        $property = Property::where('slug', '=', $slug)->first();

        return response()->json([
            'status' => 'OK',
            'data' => $property
        ]);
    }
}
