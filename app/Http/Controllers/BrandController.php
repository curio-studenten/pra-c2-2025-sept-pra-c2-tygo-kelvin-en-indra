<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
   public function show($brand_id, $brand_slug)
{
    $brand = Brand::findOrFail($brand_id);

    $manuals = $brand->manuals;

    $top5Manuals = Manual::orderByDesc('visits')->where('brand_id', $brand_id)->take(5)->get();

    return view('pages.brand_view', [
        'brand' => $brand,
        'manuals' => $manuals,
        'top5Manuals' => $top5Manuals
    ]);
}

}
