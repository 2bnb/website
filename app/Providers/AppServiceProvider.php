<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Passport\Passport;
use Socialite;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		Passport::ignoreMigrations();
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Schema::defaultStringLength(191);
		Socialite::extend('discord', function ($app) {
            $config = $app['config']['services.discord'];
            return Socialite::buildProvider('SocialiteProviders\Discord\Provider', $config);
        });
	}
}
