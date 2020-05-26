<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\Home;
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
        $home = Home::where('status', 1)->first();
        $categories = Category::where(['c_parent_id' => 0])->select('id', 'c_slug', 'c_name')->get();
        $_categories = Category::where(['c_status' => 0, 'c_parent_id' => 0])->select('id', 'c_slug', 'c_name')->get();

        View::share([
            'categories'  => $categories,
            '_categories' => $_categories,
            'home'       => $home
        ]);
    }
}
