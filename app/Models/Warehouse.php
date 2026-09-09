<?php

namespace App\Models;

use Database\Factories\WarehouseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Warehouse extends Model
{
    /** @use HasFactory<WarehouseFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'address',
        'capacity',
    ];

    /**
     * @return BelongsToMany<Book, $this>
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_warehouse', 'warehouse_id', 'book_id');
    }
}
