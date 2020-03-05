<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\Slider;
use App\Models\Web\Blog;
use App\Models\Web\About;
use App\Models\Web\Industry;
use App\Models\Web\WProduct;
use App\Models\Web\Gallery;
use App\Models\Web\Review;
use App\Models\Web\Contact;
use App\Models\Web\Service;
use App\Models\Web\ClientLogo;
use App\Models\Settings\Category;
use App\Models\Web\ContactUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
        $sliders = Slider::latest('id')->take(3)->get();
        $industrys = Industry::latest('id')->take(3)->get();
        $abouts = About::latest('id')->first();
        $logos = ClientLogo::latest('id')->get();
        $products = WProduct::latest('id')->get();
        $reviews = Review::latest('id')->take(3)->get();
        $contacts = Contact::latest('id')->take(1)->get();
        $contact = Contact::latest('id')->take(1)->first();
        $services = Service::where('status', 1)->latest('id')->take(9)->get();
        $blogs = Blog::latest('id')->take(4)->get();
        return view('website.home', get_defined_vars());
    }

    public function about(){

        $abouts = About::latest('id')->first();
        return view('website.about-us', get_defined_vars());
    }

    public function services(){
        $services = Service::where('status', 1)->get();        
        return view('website.services', get_defined_vars());
    }

    public function servicesdetails($id){

        $services = Service::findOrFail($id);

        return view('website.service-details', compact('services'));
    }

    public function allproducts(){
        $products = WProduct::paginate(3);
        return view('website.all-product', get_defined_vars());
    }

    public function products($id){
        $products = WProduct::where('category_id', $id)->latest('id')->get();
        $product = WProduct::where('category_id', $id)->first();
        return view('website.products', get_defined_vars());
    }

    public function detailsproducts($id){
        
        $products = WProduct::findOrFail($id);

        return view('website.product-details', compact('products'));
    }

    public function gellary(){

        $category = Category::where('category_type', 2)->where('status', 1)->get();
        $gallerys = Gallery::latest('id')->get();
        
        return view('website.gellary', get_defined_vars());
    }

    public function news($id){
        $blogs = Blog::where('category_id', $id)->latest('id')->get();
        return view('website.news', get_defined_vars());
    }

    public function contact(){
        $contact = Contact::latest('id')->first();

        return view('website.contact-us', get_defined_vars());
    }

    
    public function blogdetails($id){

        $blog_categories = Category::where('category_type', 3)->get();
        $blogs = Blog::latest('id')->take(3)->get();
        $blog = Blog::findOrFail($id);

        $view = $blog->view;
        $blog->view += 1;
        $blog->save();
  
        return view('website.blog-details', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function contactstore(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:15'],
            'email' => ['required', 'max:50'],
            'subject' => ['required', 'max:150'],
            'details' => ['required'],
        ]);
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->details = $request->details;
            $contact->save();


        return redirect()->back()->with('message','Email send Successfully');
    }
}
