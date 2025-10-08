<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->groupBy('category');
        $top10Manuals = Manual::orderByDesc('visits')->take(10)->get();

        return view('pages.homepage', [
            'brandsByCategory' => $brands,
            'top10Manuals' => $top10Manuals
        ]);
    }

    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = $brand->manuals;
        $top5Manuals = Manual::where('brand_id', $brand_id)
            ->orderByDesc('visits')
            ->take(5)
            ->get();

        return view('pages.brand_view', compact('brand', 'manuals', 'top5Manuals'));
    }
}
