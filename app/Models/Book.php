<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /** @use HasFactory<BookFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'author_id',
    ];

    /**
     * @return BelongsTo<Author, $this>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
