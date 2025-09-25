<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors']);
        $product->update($data);
        $product->tags()->sync($tags);
        $product->colors()->sync($colors);
        return redirect()->route('product.index');
    }
}
