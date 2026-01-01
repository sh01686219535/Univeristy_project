<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class ContactController extends Controller
{
    //contactStore
    public function contactStore(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'phone' => 'required|digits_between:7,15',
            'email' => 'required|email',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        // Session::flash('message', 'Contact Store successfully!');
        // Session::flash('alert-type', 'success');
         ToastMagic::success('Contact Store successfully!');
        return back();
    
    }
}
