<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Product\Product;
use App\Model\Vendor\Brand;
use App\Model\Category\Category;
use View;

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
        View::composer('client.header.header', function ($view){
            $view->with('categories', Category::where('root_id',0)->where('status',1)->get());
            $view->with('subCategories', Category::where('root_id','!=',0)->where('status',1)->get());
            $view->with('subSubCategories', Category::where('root_id','!=',0)->where('status',1)->get());
            $view->with('brands', Brand::all());
        });


        View::composer('client.footer.footer', function ($view){
            $view->with('latestProducts', Product::take(5)->orderBy('id','desc')->get());
            $view->with('popularProducts', Product::take(5)->orderBy('popularity','desc')->get());
        });
    }
}
