<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $products = Product::with(['category', 'tags', 'colors'])->get();
        return view('product.show', compact('product'));
    }
}
