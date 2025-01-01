<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'book_name',
        'author_name',
        'isbn',
        'book_count',
        'published_at',
    ];

    public function borrowingRecords(): HasMany
    {
        return $this->hasMany(BorrowingRecord::class);
    }
}
