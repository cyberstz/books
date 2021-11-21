<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return Warehouse::all();
    }

    public function show(Warehouse $warehouse)
    {
        return $warehouse;
    }

    public function showBooks(Warehouse $warehouse)
    {
        $books = $warehouse->books;

        foreach ($books as $book) {
            $book->author = $book->author;
        }

        return $books;
    }


    public function store(Request $request) {
        $request->validate([
            'address' => 'required',
            'capacity' => 'required'
        ]);

        Warehouse::updateOrCreate(
            ['address' => $request->address],
            ['capacity' => $request->capacity]
        );

        return true;
    }
}