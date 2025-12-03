<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //contactStore
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        // ToastMagic::success('Contact Submitted successfully!');
        return back();
    }
    //index
    public function index(){
        $contact = Contact::orderby('id','desc')->get();
        return view('admin.contact.index',compact('contact'));
    }
    //delete
    public function delete($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        // ToastMagic::success('Contact Deleted successfully!');
        return back();
    }
}
