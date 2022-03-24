<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('products.create');
    }
}
