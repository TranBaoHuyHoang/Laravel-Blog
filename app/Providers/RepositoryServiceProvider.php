<?php

namespace App\Providers;

use App\Repositories\Category\CategoryEloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostEloquentRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\SubCategory\SubCategoryEloquentRepository;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use App\Repositories\Tag\TagEloquentRepository;
use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostEloquentRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryEloquentRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryEloquentRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagEloquentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
