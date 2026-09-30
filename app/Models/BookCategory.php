<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// #[table('book_category')]
/*properti diatas digunakan untuk menentukan nama tabel di database yang penamaanyaa tidak sesuai dengan konvensi penamaan
tabel di laravel (jamak). Namun karna nnama tabel book_categoris sesudah sesuai denga konvensi penamaan tabel di laravel,
maka properti diatas tidak perlu digunakan*/

#[Fillable(['name'])]

class BookCategory extends Model
{
    // nama jamak (mengggunakan akhir s/es/les) karena book_categories berperan sebagai many dalam relasi one to many
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
