<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //新規ユーザの登録処理
        Fortify::createUsersUsing(CreateNewUser::class);

        //登録ビュー
        Fortify::registerView(function (){
            return view('register');
        });
        //ログインビュー
        Fortify::loginView(function (){
            
            return view('login');
        });
    }
        
        //RateLimiter::for('login', function (Request $request) {
            //$email = (string) $request->email;

            //return Limit::perMinute(10)->by($email . $request->ip());
        //});

    }

