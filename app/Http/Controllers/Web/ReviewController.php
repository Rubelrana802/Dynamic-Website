<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ImageConverter;


class ReviewController extends Controller
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
        $reviews = Review::paginate(10);
        return view('web.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.review.create');
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
            'name' => ['required', 'max:150'],
            'star' => ['required'],
            'details' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:min_width=300,min_height=300',

        ]);
            $review = new Review();
            $review->name = $request->name;
            $review->star = $request->star;
            $review->details = $request->details;

            //image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = ImageConverter::convert($image, 300, 300, 'web/image/review/');
                $review->image = $file_name;
            }

            $review->entry_by = Auth::user()->id;
            $review->save();
        if (!empty($review->id)) {
            $notification = array(
                'message' => 'Review item add successfully.',
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
     * @param  \App\Models\Web\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $review = Review::findOrFail($id);
        return view('web.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'max:150'],
            'star' => ['required', 'max:5', 'min:1'],
            'details' => ['required'],

        ]);

        $review = Review::find($request->review_id); //form id
        $review->name = $request->name;
        $review->star = $request->star;
        $review->details = $request->details;

        //image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = ImageConverter::convert($image, 300, 300, 'web/image/review/');
            $review->image = $file_name;
        }

        $review->entry_by = Auth::user()->id;
        $review->save();        

        if (!empty($review->id)) {
            $notification = array(
                'message' => 'Review added successfully.',
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
     * @param  \App\Models\Web\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
