<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        \App\Models\Buku::class => \App\Policies\BukuPolicy::class,
        \App\Models\Anggota::class => \App\Policies\AnggotaPolicy::class,
        \App\Models\Pengurus::class => \App\Policies\PengurusPolicy::class,
        \App\Models\Peminjaman::class => \App\Policies\PeminjamanPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
