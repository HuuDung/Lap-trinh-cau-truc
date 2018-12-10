<?php

namespace App\Providers;

use App\Models\Category;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $cart=0;
        $products = Product::paginate(12);
        $categories = Category::all();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'title' => 'Home',
            'cart' => $cart,
        ];
        View::share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
