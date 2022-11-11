<?php

namespace App\Providers;
use Response;
use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\Observers\PostObserver;
use App\Models\User;
use App\Models\Post;
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
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
           //for error message
           Response::macro('error', function($error, $status_code){

            return response()->json([
                'error' => $error,

            ],$status_code);
        });
    }
}
