<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    public function boot()
    {
        $this->registerPolicies();
   Fortify::authenticateUsing(function ($request) {
    $validated = Auth::validate([
        'username'=> $request->username,
        'password'=> $request->password,
        ]);
      
            return $validated ? Auth::getLastAttempted() : null;
    });
}
}
