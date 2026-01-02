<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $advertisement = Advertisement::latest()->get();
        return view('admin.advertisement.index',compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $advertisement = new Advertisement();
        $advertisement->place = $request->place;
        $advertisement->price = $request->price;
        $advertisement->vendor_id = $request->vendor_id;
           // Single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('AdvertisementImages'), $imageName);
            $advertisement->image = 'AdvertisementImages/' . $imageName;
        }

        $advertisement->save();
        ToastMagic::success('Advertisement Created successfully!');
        return redirect()->route('admin_advertisement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->place = $request->place;
        $advertisement->price = $request->price;
        $advertisement->vendor_id = $request->vendor_id;
           // Single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('AdvertisementImages'), $imageName);
            $advertisement->image = 'AdvertisementImages/' . $imageName;
        }

        $advertisement->save();
        ToastMagic::success('Advertisement Updated successfully!');
        return redirect()->route('admin_advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $advertisement = Advertisement::findOrFail($id);
      $advertisement->delete();
      ToastMagic::info('Advertisement Deleted successfully!');
      return back();
    }
}
