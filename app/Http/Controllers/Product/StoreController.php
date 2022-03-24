<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerField;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {

        Product::create($request->all());
        return redirect()->route('products.index');
    }
}
