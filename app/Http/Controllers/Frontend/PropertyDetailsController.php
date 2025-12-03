<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Property;
use Illuminate\Http\Request;

class PropertyDetailsController extends Controller
{
   //propertyDetails
    public function propertyDetails($id){
        $property = Property::findOrFail($id);
        return view('frontend.property.property-details',compact('property'));
    }
}
