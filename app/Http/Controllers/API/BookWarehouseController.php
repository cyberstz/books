<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Warehouse;
use App\Models\BookWarehouse;

class BookWarehouseController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'book' => 'required',
            'warehouse' => 'required',
            'count' => 'required'
        ]);

        $book = Book::firstOrFail([
            'name' => $request->book
        ]);

        $warehouse = Warehouse::firstOrFail([
            'address' => $request->warehouse
        ]);

        BookWarehouse::updateOrCreate(
            [
                'book_id' => $book->id,
                'warehouse_id' => $warehouse->id
            ],
            ['count' => $request->count]
        );

        return true;
    }
}