<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;
use App\Models\Settings\Category;

class BlogController extends Controller
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
        $blogs = Blog::paginate(10);
        return view('web.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('category_type', 3)->where('status', 1)->get();
        return view('web.blog.create', get_defined_vars());
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
            'category_id' => ['required'],
            'title' => ['required', 'max:150'],
            'details' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=800,min_height=500',
        ]);
        
            $Blog = new Blog();
            $Blog->category_id = $request->category_id;  
            $Blog->title = $request->title;  
            $Blog->details = $request->details;
            $Blog->date = date('Y-m-d');  
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 800, 500, 'web/image/blog/');
                $Blog->image = $file_name;
            }

            $Blog->entry_by =Auth::user()->id;
            $Blog->save();

        if (!empty($Blog->id)) {
            $notification = array(
                'message' => 'Blog add successfully.',
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
     * @param  \App\Models\Web\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $Blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $category = Category::where('category_type', 3)->where('status', 1)->get();
        $blog = Blog::findOrFail($id);
        return view('web.blog.edit', compact('blog', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => ['required'],
            'title' => ['required', 'max:150'],
            'details' => ['required'],
        ]);
            
            $Blog = Blog::find($request->blog_id);
            $Blog->category_id = $request->category_id;  
            $Blog->title = $request->title;  
            $Blog->details = $request->details;  
                   
            //image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 800, 500, 'web/image/blog/');
                $Blog->image = $file_name;
            }
            $Blog->save();

            
        if (!empty($Blog->id)) {
            $notification = array(
                'message' => 'Blog Update successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $Blog)
    {
        //
    }
}
