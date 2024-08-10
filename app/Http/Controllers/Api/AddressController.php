<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;               
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function address($zip)
    {
        $address = Address::where('zip', $zip)->first();
    
        if ($address) {
            return response()->json($address);
        } else {
            return response()->json(['message' => 'Address not found'], 404);
        }
    }
}