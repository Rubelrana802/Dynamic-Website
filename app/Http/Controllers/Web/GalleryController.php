<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;
use App\Models\Settings\Category;




class GalleryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $gallerys = Gallery::paginate(10);
        return view('web.gallery.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = Category::where('category_type', 2)->where('status', 1)->get();

        return view('web.gallery.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => ['required'],
            'title' => ['required', 'max:50'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=750,min_height=500',
        ]);

        $gallery = new Gallery();
        $gallery->category_id = $request->category_id;
        $gallery->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = ImageConverter::convert($image, 750, 500, 'web/image/clientlogo/');
            $gallery->image = $file_name;
        }

        $gallery->entry_by = Auth::user()->id;
        $gallery->save();
        if (!empty($gallery->id)) {
            $notification = array(
                'message' => 'Gallery item add successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        //return $request->all();
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        $category = Category::where('category_type', 2)->where('status', 1)->get();
        return view('web.gallery.edit', compact('gallery', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gallery $gallery
     * @return Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'category_id' => ['required'],
            'title' => ['required', 'max:50'],

        ]);

        $gallery->category_id = $request->category_id;
        $gallery->title = $request->title;
        //image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = ImageConverter::convert($image, 750, 500, 'web/image/gallery/');
            $gallery->image = $file_name;
        }

        $gallery->entry_by = Auth::user()->id;
        $gallery->save();
        if (!empty($gallery->id)) {
            $notification = array(
                'message' => 'Gallery edit successfully.',
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
     * @param Gallery $gallery
     * @return Response
     */
    public function destroy(Gallery $gallery)
    {
        if (Storage::disk('public')->exists('web/image/gallery/' . $post->image)) {
            Storage::disk('public')->delete()('web/image/gallery/' . $post->image);
        }
        $gallery->delete();

        if (!empty($gallery->id)) {
            $notification = array(
                'message' => 'Gallery item deleted successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back();
    }
}
