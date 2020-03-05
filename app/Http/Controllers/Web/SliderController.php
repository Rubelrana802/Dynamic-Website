<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ImageConverter;

class SliderController extends Controller
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
        $sliders = Slider::paginate(10);
        return view('web.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.slider.create');
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
            'details' => ['required', 'max:225'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=1920,min_height=1080',
        ]);

            $slider = new Slider();
            $slider->title = $request->title;
            $slider->details = $request->details;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 1920, 1080, 'web/image/slider/');
                $slider->image = $file_name;
            }
            $slider->entry_by =Auth::user()->id;
            $slider->save();

        if (!empty($slider->id)) {
            $notification = array(
                'message' => 'Slider add successfully.',
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
     * @param  \App\Models\Web\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('web.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request,[
            'title' => ['required', 'max:150'],
            'details' => ['required', 'max:255'],

        ]);
            $slider->title = $request->title;
            $slider->details = $request->details;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 1920, 1080, 'web/image/slider/');
                $slider->image = $file_name;
            }

            $slider->entry_by =Auth::user()->id;
            $slider->save();
        if (!empty($slider->id)) {
            $notification = array(
                'message' => 'Slider item add successfully.',
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
     * @param  \App\Models\Web\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    /**
     * @param $id
     * @param $image
     * @return string
     */
    public function slider_image($image) {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('web/image/slider/' . $filename);
        // create new image with transparent background color
        $background = Image::canvas(688, 387);
        // read image file and resize it to 200x200
        $img = Image::make($image);
        // Image Height
        $height = $img->height();
        // Image Width
        $width = $img->width();
        $x = NULL;
        $y = NULL;
        if ($width > $height) {
            $y = 688;
        } else {
            $x = 387;
        }
        //Resize Image
        $img->resize($x, $y, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        // insert resized image centered into background
        $background->insert($img, 'center');
        // save
        $background->save($location);
        return $filename;
    }
}
