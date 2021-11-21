<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\WarehouseBook;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'capacity'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_warehouse', 'warehouse_id', 'book_id');
    }
}
