<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\ClientLogo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;

class ClientLogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $logos = ClientLogo::paginate(10);
        return view('web.clientlogo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.clientlogo.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=172,min_height=88',

        ]);
        
            $logo = new ClientLogo();
            $logo->title = $request->title;  
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 172, 88, 'web/image/clientlogo/');
                $logo->image = $file_name;
            }
            $logo->save();

        if (!empty($logo->id)) {
            $notification = array(
                'message' => 'Client logo add successfully.',
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
     * @param  \App\Models\Web\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = ClientLogo::findOrFail($id);
        return view('web.clientlogo.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => ['required', 'max:150'],
        ]);
        
            $logo = ClientLogo::find($request->logo_id); 
            $logo->title = $request->title;  
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 172, 88, 'web/image/clientlogo/');
                $logo->image = $file_name;
            }
            $logo->save();

        if (!empty($logo->id)) {
            $notification = array(
                'message' => 'Client logo updated successfully.',
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
     * @param  \App\Models\Web\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
