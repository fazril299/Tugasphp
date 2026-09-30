<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['subscription_package_id', 'book_id'])]

class SubcriptionPackageBook extends Model
{
    protected $table = 'subscription_package_books';

    public function subcriptionPackage(): BelongsTo
    {
        return $this->belongsTo(SubcriptionPackage::class, 'subscription_package_id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
