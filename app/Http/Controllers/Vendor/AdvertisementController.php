<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Devrabiul\ToastMagic\Facades\ToastMagic;


class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorId = Auth::guard('vendor')->user()->id;

        $advertisement = Advertisement::where('vendor_id', $vendorId)
            ->latest()
            ->get();
        return view('vendor.advertisement.index', compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendorId = Auth::guard('vendor')->user()->id;
        $advertisement = new Advertisement();
        $advertisement->place = $request->place;
        $advertisement->price = $request->price;
        $advertisement->vendor_id = $vendorId;
        // Single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('AdvertisementImages'), $imageName);
            $advertisement->image = 'AdvertisementImages/' . $imageName;
        }

        $advertisement->save();
         ToastMagic::success('Advertisement added successfully!');
        return redirect()->route('advertisement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('vendor.advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $vendorId = Auth::guard('vendor')->user()->id;
        $advertisement->place = $request->place;
        $advertisement->price = $request->price;
        $advertisement->vendor_id = $vendorId;
        // Single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('AdvertisementImages'), $imageName);
            $advertisement->image = 'AdvertisementImages/' . $imageName;
        }

        $advertisement->save();
        ToastMagic::success('Advertisement Updated successfully!');
        return redirect()->route('advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();
        ToastMagic::success('Advertisement Deleted successfully!');
        return back();
    }
}
