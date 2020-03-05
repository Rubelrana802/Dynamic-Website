<?php

namespace App\Providers;

use App\Models\Settings\Category;
use App\Models\Web\Contact;
use App\Models\Web\About;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['website.index'], function ($view) {
            $blog_categories = Category::where('category_type', 3)->get();
            $product_categories = Category::where('category_type', 1)->get();
            $contact = Contact::first();
            $about = About::first();
			$view->with(compact('product_categories', 'contact', 'blog_categories', 'about'));
		});
    }
}
