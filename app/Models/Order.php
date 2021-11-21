<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'book_id',
        'client_id',
        'amount',
        'status'
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
