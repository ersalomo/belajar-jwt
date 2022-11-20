<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImple;
use App\Repositories\Article\ArticleRepositoryImple;
use App\Repositories\Article\ArticleRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'User',
            'Article'
        ];
        // foreach ($models as $model) {
        //     $this->app->bind(
        //         "App\Repositories\\{$model}\\{$model}Repository",
        //         "App\Repositories\\{$model}\\{$model}RepositoryImple"
        //     );
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
