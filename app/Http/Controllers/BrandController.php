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

    return view('pages.brand_view', [
        'brand' => $brand,
        'manuals' => $manuals,
    ]);
}

}
