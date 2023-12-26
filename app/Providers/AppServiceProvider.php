<?php

namespace App\Providers;

use App\Adapters\Presenters\Library\CreateAuthorJsonPresenter;
use App\Adapters\Presenters\Library\CreateBookJsonPresenter;
use App\Adapters\Presenters\Library\ListAllBooksJsonPresenter;
use App\Adapters\Presenters\Library\ListBooksByAuthorJsonPresenter;
use App\Adapters\Presenters\Library\CreateProductJsonPresenter; //* *//
use App\Adapters\Presenters\Library\ListProductsJsonPresenter;
use App\Core\Domain\Library\Ports\Persistence\AuthorRepository;
use App\Core\Domain\Library\Ports\Persistence\BookRepository;
use App\Core\Domain\Library\Ports\Persistence\ProductRepository; //* *//
use App\Core\Domain\Library\Ports\UseCases\CreateAuthor\CreateAuthorUseCase;
use App\Core\Domain\Library\Ports\UseCases\CreateBook\CreateBookUseCase;
use App\Core\Domain\Library\Ports\UseCases\ListAllBooks\ListAllBooksUseCase;
use App\Core\Domain\Library\Ports\UseCases\ListBooksByAuthor\ListBooksByAuthorUseCase;
use App\Core\Domain\Library\Ports\UseCases\CreateProduct\CreateProductUseCase;
use App\Core\Domain\Library\Ports\UseCases\ListProduct\ListProductsUseCase;
use App\Core\Services\Library\CreateAuthorService;
use App\Core\Services\Library\CreateBookService;
use App\Core\Services\Library\ListAllBooksService;
use App\Core\Services\Library\ListBooksByAuthorService;
use App\Core\Services\Library\CreateProductService;
use App\Core\Services\Library\ListProductsService;
use App\Http\Controllers\CreateAuthorController;
use App\Http\Controllers\CreateBookController;
use App\Http\Controllers\ListAllBooksController;
use App\Http\Controllers\ListBooksByAuthorController;
use App\Http\Controllers\CreateProductController; //* *//
use App\Http\Controllers\ListProductController;
use App\Infra\Adapters\Persistence\Eloquent\Repositories\AuthorEloquentRepository;
use App\Infra\Adapters\Persistence\Eloquent\Repositories\BookEloquentRepository;
use App\Infra\Adapters\Persistence\Eloquent\Repositories\ProductEloquentRepository; //* *//
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
        $this->bindDefaultDependencies();
        $this->libraryDependencies();
    }

    public function bindDefaultDependencies()
    {
        /**
         * Example bindings
         */
        $this->app->bind(AuthorRepository::class, AuthorEloquentRepository::class);
        $this->app->bind(BookRepository::class, BookEloquentRepository::class);
        $this->app->bind(ProductRepository::class, ProductEloquentRepository::class);
    }

    /**
     * The following bindings is project examples, remove to start your project
     */
    public function libraryDependencies()
    {

        $this->app
            ->when(CreateProductController::class)
            ->needs(CreateProductUseCase::class)
            ->give(
                fn($app) => $app->make(CreateProductService::class, [
                    "output" => $app->make(CreateProductJsonPresenter::class),
                ]),
            );

        $this->app
            ->when(ListProductController::class)
            ->needs(ListProductsUseCase::class)
            ->give(
                fn($app) => $app->make(ListProductsService::class, [
                    "output" => $app->make(ListProductsJsonPresenter::class)
                ])
            );
        
        $this->app
            ->when(CreateAuthorController::class)
            ->needs(CreateAuthorUseCase::class)
            ->give(
                fn($app) => $app->make(CreateAuthorService::class, [
                    "output" => $app->make(CreateAuthorJsonPresenter::class),
                ]),
            );

        $this->app
            ->when(CreateBookController::class)
            ->needs(CreateBookUseCase::class)
            ->give(
                fn($app) => $app->make(CreateBookService::class, [
                    "output" => $app->make(CreateBookJsonPresenter::class),
                ]),
            );

        $this->app
            ->when(ListAllBooksController::class)
            ->needs(ListAllBooksUseCase::class)
            ->give(
                fn($app) => $app->make(ListAllBooksService::class, [
                    "output" => $app->make(ListAllBooksJsonPresenter::class),
                ]),
            );

        $this->app
            ->when(ListBooksByAuthorController::class)
            ->needs(ListBooksByAuthorUseCase::class)
            ->give(
                fn($app) => $app->make(ListBooksByAuthorService::class, [
                    "output" => $app->make(ListBooksByAuthorJsonPresenter::class),
                ]),
            );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
