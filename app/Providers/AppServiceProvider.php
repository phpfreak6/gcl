<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! $this->app->isLocal()) {
            $this->app['request']->server->set('HTTPS', true);
        }

        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Schema::defaultStringLength(191);

        if(env('APP_ENV') == 'production')
            $url->forceScheme('https');

        // morph map resolution
        // Relation::morphMap([
        //     'Invoice' => \App\Models\Invoice::class,
        //     'Expense' => \App\Models\Expense::class,
        //     'FeeCollection' => \App\Models\FeeCollection::class,
        // ]);
    }
}
