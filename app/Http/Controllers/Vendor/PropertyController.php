<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorId = Auth::guard('vendor')->id();
        $property = Property::where('vendor_id', $vendorId)->orderBy('id', 'desc')->get();
        return view("vendor.property.index", compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("vendor.property.create", compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required',
            'category_id'  => 'required',
            'price'        => 'required',
            'bedroom'      => 'required',
            'bathroom'     => 'required',
            'location'     => 'required',
            'division'     => 'required',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'multi_image.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // ✅ CORRECT
        $vendorId = Auth::guard('vendor')->id();

        $property = new Property();
        $property->vendor_id   = $vendorId;
        $property->title       = $request->title;
        $property->category_id = $request->category_id;
        $property->size        = $request->size;
        $property->price       = $request->price;
        $property->bedroom     = $request->bedroom;
        $property->bathroom    = $request->bathroom;
        $property->location    = $request->location;
        $property->division    = $request->division;
        $property->description = $request->description;

        // Single image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('PropertyImages'), $imageName);
            $property->image = 'PropertyImages/' . $imageName;
        }

        // Multiple images
        if ($request->hasFile('multi_image')) {
            $images = [];
            foreach ($request->file('multi_image') as $img) {
                $name = uniqid() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('PropertyMultiImages'), $name);
                $images[] = 'PropertyMultiImages/' . $name;
            }
            $property->multi_image = json_encode($images);
        }

        $property->save();

        return redirect()->route('property.index')
            ->with('success', 'Property added successfully!');
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
        $categories = Category::all();
        $property = Property::findOrFail($id);
        return view("vendor.property.edit", compact('property', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendorId = Auth::guard('vendor')->user()->id;
        if ($vendorId) {
            $property = Property::findOrFail($id);
            $property->VendorId = $vendorId;
            $property->title = $request->title;
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
            // ToastMagic::success('Property Update successfully!');
            return redirect('property');
        } else {
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

        // ToastMagic::success('Property deleted successfully!');
        return back();
    }
}
