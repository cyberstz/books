<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use App\Models\Order;
use App\Models\Warehouse;
use App\Models\Book;
use App\Models\Client;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $order->warehouse = $order->warehouse;
            $order->book = $order->book;
            $order->client = $order->client;
        }

        return $orders;
    }

    public function show(Order $order)
    {
        $order->warehouse = $order->warehouse;
        $order->book = $order->book;
        $order->client = $order->client;

        return $order;
    }


    public function store(Request $request) {
        $request->validate([
            'id' => 'optional',
            'warehouse' => 'optional',
            'book' => 'optional',
            'client' => 'optional',
            'amount' => 'optional',
            'status' => 'optional'
        ]);

        $warehouse = Warehouse::where('address', $request->warehouse ?? '')->first();
        $book = Book::where('address', $request->book ?? '')->first();
        $client = Client::where('address', $request->client ?? '')->first();
        
        Order::updateOrCreate(
            ['id' => $request->id],
            [
                'warehouse_id' => $warehouse->id,
                'book' => $book->id,
                'client' => $client->id,
                'amount' => $request->amount,
                'status' => $request->status
            ]
        );

        return true;
    }
}
