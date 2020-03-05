<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\WProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;
use App\Models\Settings\Category;




class WProductController extends Controller
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
        $wProducts = WProduct::paginate(10);
        return view('web.wProduct.index', compact('wProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('category_type', 1)->where('status', 1)->get();
        return view('web.wProduct.create', get_defined_vars());
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
            'title' => ['required', 'max:50'],
            'details' => ['required', 'max:150'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=467,min_height=600',
        ]);
        
            $wProduct = new WProduct();
            $wProduct->category_id = $request->category_id;  
            $wProduct->title = $request->title;  
            $wProduct->details = $request->details;
            $wProduct->details2 = $request->details2;  
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 467, 600, 'web/image/product/');
                $wProduct->image = $file_name;
            }

            $wProduct->entry_by =Auth::user()->id;
            $wProduct->save();

        if (!empty($wProduct->id)) {
            $notification = array(
                'message' => 'Product add successfully.',
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
     * @param  \App\Models\Web\WProduct  $wProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WProduct $wProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\WProduct  $wProduct
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $category = Category::where('category_type', 1)->where('status', 1)->get();
        $wProduct = WProduct::findOrFail($id);
        return view('web.wProduct.edit', compact('wProduct', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\WProduct  $wProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WProduct $wProduct)
    {
        $this->validate($request,[
            'category_id' => ['required'],
            'title' => ['required', 'max:50'],
            'details' => ['required', 'max:150'],
        ]);
        
            $wProduct->category_id = $request->category_id;  
            $wProduct->title = $request->title;  
            $wProduct->details = $request->details;  
            $wProduct->details2 = $request->details2;  
                   
            //image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 467, 600, 'web/image/product/');
                $wProduct->image = $file_name;
            }

            $wProduct->entry_by = Auth::user()->id;
            $wProduct->save();

            
        if (!empty($wProduct->id)) {
            $notification = array(
                'message' => 'Product update successfully.',
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
     * @param  \App\Models\Web\WProduct  $wProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WProduct $wProduct)
    {
        //
    }
}
