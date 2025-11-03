<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyDetailsController extends Controller
{
    //propertyDetails
    public function propertyDetails($id){
        $property = Property::findOrFail($id);
        return view('frontend.property.property-details',compact('property'));
    }
}
