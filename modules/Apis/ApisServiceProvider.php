<?php

namespace Modules\Apis;

use Illuminate\Support\ServiceProvider;

class ApisServiceProvider extends ServiceProvider
{
    public function register()
    {
        // ...
    }

    public function boot()
    {
        $this->loadMigrationsFrom(database_path('migrations'));
    }
}
