<?php

namespace App\Providers;

use App\Models\Buyer;
use App\Models\Seller;
use App\Policies\BuyerPolicy;
use App\Policies\SellerPolicy;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Buyer::class => BuyerPolicy::class,
        Seller::class => SellerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addMinutes(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        Passport::tokensCan([
            'purchase-product' => 'Create a new transaction for a spesific product',
            'manage-products' => 'Create, read, update, and delete products (CRUD)',
            'manage-account' => 'Read your account data, id,name,email, if verified, and if admin (cannot read password).Modify your account data (email and password) Cannot delete your account',
            'read-general' => 'read generainformations like purchasing categories, your transactions (purchases and sales)',
        ]);
    }
}
