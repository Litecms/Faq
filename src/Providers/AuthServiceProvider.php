<?php

namespace Litecms\Faq\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Faq policy
        'Litecms\Faq\Models\Faq' => \Litecms\Faq\Policies\FaqPolicy::class,
// Bind Category policy
        'Litecms\Faq\Models\Category' => \Litecms\Faq\Policies\CategoryPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
