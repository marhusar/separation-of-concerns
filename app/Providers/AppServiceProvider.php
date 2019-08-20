<?php

namespace App\Providers;

use App\Communication\Dummy\Repository\SignedMessageRepository;
use App\Communication\Policy\ShowMessagePolicy;
use App\Communication\Repository\MessageRepository;
use App\Membership\Repository\MembershipRepository;
use App\Membership\Dummy\Repository\NamedMembershipRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MembershipRepository::class, NamedMembershipRepository::class);
        $this->app->bind(ShowMessagePolicy::class, function ($app) {
           return new ShowMessagePolicy($this->app->make(MembershipRepository::class));
        });

        $this->app->bind(MessageRepository::class, SignedMessageRepository::class);
    }
}
