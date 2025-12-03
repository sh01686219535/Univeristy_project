<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Property;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {

        $property = Property::orderBy('id', 'desc')->get();
        return view("admin.property.index", compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.property.create", compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title'      => 'required',
            'category_id' => 'required',
            'price'      => 'required',
            'bedroom'    => 'required',
            'bathroom'   => 'required',
            'location'   => 'required',
            'division'   => 'required',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'multi_image.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);


        // New Property
        $property = new Property();

        // Assign fields
        $property->title       = $request->title;
        $property->category_id = $request->category_id;
        $property->size        = $request->size;
        $property->price       = $request->price;
        $property->bedroom     = $request->bedroom;
        $property->bathroom    = $request->bathroom;
        $property->location    = $request->location;
        $property->division    = $request->division;
        $property->description = $request->description;

        /***********************
         * Single Image Upload
         ***********************/
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('PropertyImages'), $imageName);
            $property->image = 'PropertyImages/' . $imageName;
        }

        /*************************
         * Multiple Image Upload
         *************************/
        if ($request->hasFile('multi_image')) {
            $multiImages = [];
            foreach ($request->file('multi_image') as $multi) {
                if ($multi->isValid()) {
                    $multiName = uniqid() . '.' . $multi->getClientOriginalExtension();
                    $multi->move(public_path('PropertyMultiImages'), $multiName);
                    $multiImages[] = 'PropertyMultiImages/' . $multiName;
                }
            }
            $property->multi_image = json_encode($multiImages);
        }

        // Save Property
        $property->save();

        return redirect()->route('admin_property.index')
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
        return view("admin.property.edit", compact('property', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::findOrFail($id);
        $property->price = $request->price;
        $property->title = $request->title;
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
        return redirect('admin_property');
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
