<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndustryController extends Controller
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
        $industrys = Industry::paginate(10);
        return view('web.industry.index', compact('industrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.industry.create');
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
            'phone' => ['required', 'max:15'],
            'address' => ['required'],
        ]);
            $industry = new Industry();
            $industry->title = $request->title;  
            $industry->phone = $request->phone;  
            $industry->phone1 = $request->phone1; 
            $industry->email = $request->email;  
            $industry->address = $request->address;  
            $industry->address1 = $request->address1;  
            $industry->entry_by =Auth::user()->id;
            $industry->save();
        if (!empty($industry->id)) {
            $notification = array(
                'message' => 'Industry item add successfully.',
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
     * @param  \App\Models\Web\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        return view('web.industry.view', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return view('web.industry.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $this->validate($request,[
            'title' => ['required', 'max:150'],
            'phone' => ['required', 'max:15'],
            'address' => ['required',],
        ]);
            $industry->title = $request->title;  
            $industry->phone = $request->phone; 
            $industry->phone1 = $request->phone1; 
            $industry->email = $request->email;  
            $industry->address = $request->address;  
            $industry->address1 = $request->address1;  
            $industry->entry_by =Auth::user()->id;
            $industry->save();
        if (!empty($industry->id)) {
            $notification = array(
                'message' => 'Industry item add successfully.',
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
     * @param  \App\Models\Web\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        //
    }
}
