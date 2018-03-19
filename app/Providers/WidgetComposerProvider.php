<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WidgetComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->categoryWidget();
    }
    public function categoryWidget() {
        view()->composer('includes.categories_widget', 'App\Http\Composers\CategoryWidgetComposer');
    }
}
