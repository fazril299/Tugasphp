<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name_package', 'description', 'color', 'price'])]

class SubcriptionPackage extends Model
{
    protected $table = 'subscription_packages';

    public function subcriptionPackageUsers(): HasMany
    {
        return $this->hasMany(SubcriptionPackageUser::class, 'subscription_package_id');
    }

    public function subcriptionPackageBooks(): HasMany
    {
        return $this->hasMany(SubcriptionPackageBook::class, 'subscription_package_id');
    }
}
