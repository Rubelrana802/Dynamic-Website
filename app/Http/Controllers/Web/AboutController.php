<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;

class AboutController extends Controller
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
        $abouts = About::paginate(10);
        return view('web.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.about.create');
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
            'short_about' => ['required', 'max:450'],
            'paragraph' => ['required'],
        ]);
        
            $about = new About();
            $about->title = $request->title;  
            $about->short_about = $request->short_about;  
            $about->paragraph = $request->paragraph;  
            $about->entry_by =Auth::user()->id;
            $about->save();

        if (!empty($about->id)) {
            $notification = array(
                'message' => 'About add successfully.',
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
    public function edit(About $about)
    {
         return view('web.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {


        $this->validate($request,[
            'title' => ['required', 'max:150'],
            'short_about' => ['required', 'max:500'],
            'paragraph' => ['required'],
            'facebook' => ['required'],
            'twitter' => ['required'],
            'youtube' => ['required'],
            'linkedin' => ['required'],
        ]);
        
            $about->title = $request->title;
            $about->short_about = $request->short_about;
            //image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 750, 500, 'web/image/');
                $about->image = $file_name;
            }
            $about->paragraph = $request->paragraph;  
            $about->facebook = $request->facebook;  
            $about->twitter = $request->twitter;  
            $about->youtube = $request->youtube;  
            $about->linkedin = $request->linkedin;  
            $about->save();

        if (!empty($about->id)) {
            $notification = array(
                'message' => 'About updated successfully.',
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
