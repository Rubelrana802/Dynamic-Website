<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Company;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageConverter;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $company = Company::all();
        return view('settings.company.index', get_defined_vars());
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('settings.company.view', compact('company'));
    }

    public function edit($id){
        $company = Company::where('id', $id)->first();
        return view('settings.company.update', get_defined_vars()); 
    }

    public function update(Request $request)
    {

        $company = Company::find($request->company_id); //form id 
        $company->title = $request->title; 
        $company->company_name = $request->company_name; 
        $company->email = $request->email; 
        $company->mobile = $request->mobile; 
        $company->phone = $request->phone; 
        //image upload
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $file_name = ImageConverter::convert($image, 300, 300, 'img/');
            $company->logo = $file_name;
        }
        $company->address = $request->address;
        $company->website = $request->website;  
        $company->save();
        
        if (!empty($company)) {
            $notification = array(
                'message' => 'Company update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.settings.company.show', $company->id)->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);   
    }
}
