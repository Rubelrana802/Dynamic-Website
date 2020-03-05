<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;



class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('web.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'max:150'],
            'phone' => ['required', 'max:150'],
            'address' => ['required'],

        ]);

            $contact = new Contact();
            $contact->title = $request->title; 


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 300, 300, 'web/image/logos/');
                $contact->logo = $file_name;
            }

            $contact->phone = $request->phone;  
            $contact->email = $request->email;  
            $contact->address = $request->address;  
            $contact->website = $request->website;  
            $contact->googlemap = $request->googlemap;  
            $contact->entry_by =Auth::user()->id;
            $contact->save();
        if (!empty($contact->id)) {
            $notification = array(
                'message' => 'Contact item add successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }//return $request->all();
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('web.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $contacts = Contact::findOrFail($id);
        $this->validate($request,[
            'title' => ['required', 'max:150'],
            'phone' => ['required', 'max:150'],
            'address' => ['required'],

        ]);

            $contacts->title = $request->title; 

            //image upload
             //image upload
             if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 300, 300, 'web/image/');
                $contacts->logo = $file_name;
            }
            
            $contacts->phone = $request->phone;  
            $contacts->email = $request->email;  
            $contacts->address = $request->address; 
            $contacts->website = $request->website;
            $contacts->googlemap = $request->googlemap;
            $contacts->fax = $request->fax; 
            $contacts->entry_by =Auth::user()->id;
            $contacts->save();
        if (!empty($contacts->id)) {
            $notification = array(
                'message' => 'Contact updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }//return $request->all();
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
