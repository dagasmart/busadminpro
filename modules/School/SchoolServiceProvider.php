<?php

namespace Modules\School;

use DagaSmart\BizAdmin\Extend\Manager;
use Illuminate\Support\ServiceProvider;

class SchoolServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    public function boot()
    {
        $this->loadMigrationsFrom(database_path('migrations'));
    }

    public function registerServices()
    {
        $this->app->singleton('admin.extend', Manager::class);
    }

}
