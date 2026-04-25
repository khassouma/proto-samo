<?php

namespace App\Providers;

use App\Models\Dossier;
use App\Models\ProductivitySheet;
use App\Policies\DossierPolicy;
use App\Policies\ProductivitySheetPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Dossier::class => DossierPolicy::class,
        ProductivitySheet::class => ProductivitySheetPolicy::class,
    ];
}
