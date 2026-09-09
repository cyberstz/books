<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => 'required',
            'capacity' => 'required'
        ];
    }
}
