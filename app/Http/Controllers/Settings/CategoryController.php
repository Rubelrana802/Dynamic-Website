<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Category;
use Auth;

class CategoryController extends Controller
{
     /**
     * ProductCategoryController constructor.
     */
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
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('settings.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // generate code
        $category_id = str_pad(Category::max('id') + 1, 4, '0', STR_PAD_LEFT);

        request()->validate([
            'category_name' => ['required', 'string', 'max:100', 'unique:categories'],
            'category_type' => ['required'],
            'details' => ['max:225'],
        ]);

        $category = new Category();
        $category->entry_by = Auth::user()->id;
        $category->category_type = $request->category_type;
        $category->category_name = $request->category_name;
        $category->details = $request->details;
        $category->save(); 

        if (!empty($category->id)) {
            $notification = array(
                'message' => 'Category add successfully.',
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
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('settings.category.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('settings.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'category_name' => 'required|string|max:100|unique:categories,category_name,' . $category->id,
            'category_type' => ['required'],
            'details' => ['max:225'],
            'status' => 'required',
        ]);

        $category->category_type = $request->category_type;
        $category->category_name = $request->get('category_name');
        $category->details = $request->get('details');
        $category->status = $request->get('status');
        $affected_row = $category->save();

        if (!empty($affected_row)) {
            $notification = array(
                'message' => 'Category update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.settings.category.show', $category->id)->with($notification);
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
     * @param  \App\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        //
    }

    /**
     * @return mixed
     */
    public function published_categories()
    {
        return Category::where('status', 1)->get();
    }
}
