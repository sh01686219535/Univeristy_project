<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendor\VendorRequest;
use App\Models\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use File;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authId = Auth::id();
        $vendor = Vendor::where('authId', $authId)->first();
        if (isset($vendor)) {
            $property = Property::where('vendorId',$vendor->id)->orderBy('id', 'desc')->get();
            return view("backend.property.index", compact('property'));
        } else {
            $property = Property::orderBy('id', 'desc')->get();
            return view("backend.property.index", compact('property'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.property.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        $authId = Auth::id();
        $vendor = Vendor::where('authId', $authId)->first();
        if (isset($vendor)) {
            $property = new Property();
            $property->VendorId = $vendor->id;
            $property->price = $request->price;
            $property->bedroom = $request->bedroom;
            $property->bathroom = $request->bathroom;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->division = $request->division;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('PropertyImages'), $imageName);
                $property->image = 'PropertyImages/' . $imageName;
            }
            $property->save();
            ToastMagic::success('Property added successfully!');
            return redirect('property');
        } else {
            $property = new Property();
            $property->VendorId = $vendor->id;
            $property->price = $request->price;
            $property->bedroom = $request->bedroom;
            $property->bathroom = $request->bathroom;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->division = $request->division;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('PropertyImages'), $imageName);
                $property->image = 'PropertyImages/' . $imageName;
            }
            $property->save();
            ToastMagic::success('Property added successfully!');
            return redirect('property');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        return view("backend.property.edit", compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authId = Auth::id();
        $vendor = Vendor::where('authId', $authId)->first();
        if ($vendor) {
            $property = Property::findOrFail($id);
            $property->VendorId = $vendor->id;
            $property->price = $request->price;
            $property->bedroom = $request->bedroom;
            $property->bathroom = $request->bathroom;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->division = $request->division;
            if ($request->file('image')) {
                if ($property->image && File::exists(public_path($property->image))) {
                    File::delete(public_path($property->image));
                }
                $image = $request->image;
                $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('PropertyImages'), $imageName);
                $property['image'] = 'PropertyImages/' . $imageName;
            }
            $property->save();
            ToastMagic::success('Property Update successfully!');
            return redirect('property');
        } else {
            $property = Property::findOrFail($id);
            $property->price = $request->price;
            $property->bedroom = $request->bedroom;
            $property->bathroom = $request->bathroom;
            $property->location = $request->location;
            $property->description = $request->description;
            $property->division = $request->division;
            if ($request->file('image')) {
                if ($property->image && File::exists(public_path($property->image))) {
                    File::delete(public_path($property->image));
                }
                $image = $request->image;
                $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('PropertyImages'), $imageName);
                $property['image'] = 'PropertyImages/' . $imageName;
            }
            $property->save();
            ToastMagic::success('Property Update successfully!');
            return redirect('property');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        if ($property->image && File::exists(public_path($property->image))) {
            File::delete(public_path($property->image));
        }

        $property->delete();

        ToastMagic::success('Property deleted successfully!');
        return back();
    }
}
