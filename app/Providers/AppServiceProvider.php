<?php

namespace App\Providers;

use App\Contracts\Interfaces\CartInterface;
use App\Contracts\Interfaces\CheckoutInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\TransactionInterface;
use App\Contracts\Repositories\CartRepository;
use App\Contracts\Repositories\CheckoutRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\TransactionRepository;
use App\Services\CartService;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Binding untuk CartInterface
        $this->app->bind(CartInterface::class, function ($app) {
            return new CartRepository(new Cart());
        });

        // Binding untuk ProductInterface
        $this->app->bind(ProductInterface::class, ProductRepository::class);

        $this->app->bind(TransactionInterface::class, TransactionRepository::class);

        $this->app->bind(CheckoutInterface::class, CheckoutRepository::class);

        // Binding untuk CartService
        $this->app->bind(CartService::class, function ($app) {
            return new CartService($app->make(CartInterface::class));
        });
    }

    public function boot()
    {
        //
    }
}