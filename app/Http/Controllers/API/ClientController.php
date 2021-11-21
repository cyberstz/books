<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function showOrders(Client $client)
    {
        $orders = $client->orders;

        foreach ($orders as $order) {
            $order->warehouse = $order->warehouse;
            $order->book = $order->book;
            $order->client = $order->client;
        }

        return $orders;
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        if (Client::where('name', $request->name)->exists()) {
            $client = Client::where('name', $request->name)->first();
            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone   
            ]);

            return true;
        }

        if (Client::where('email', $request->email)->exists()) {
            $client = Client::where('email', $request->email)->first();
            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone   
            ]);

            return true;
        }

        if (Client::where('phone', $request->phone)->exists()) {
            $client = Client::where('phone', $request->phone)->first();
            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone   
            ]);

            return true;
        }

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return true;
    }
}