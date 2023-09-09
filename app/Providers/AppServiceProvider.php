<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'Store' => 'App\Models\Store',
            'Insurer' => 'App\Models\Insurer',
            'Garage' => 'App\Models\Garage'
        ]);

        Builder::macro('whereRelationIn', function ($relation, $column, $array) {
            return $this->whereHas(
                $relation, fn($q) => $q->whereIn($column, $array)
            );
        });
    }
}
