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

    public function show($name)
    {
        $name = urldecode($name); // converts %20 to space
        $brand = Brand::where('name', $name)->firstOrFail();
        $manuals = $brand->manuals;
        $top5Manuals = Manual::where('brand_id', $brand->id)
                            ->orderByDesc('visits')
                            ->take(5)
                            ->get();

        return view('pages.brand_view', compact('brand', 'manuals', 'top5Manuals'));
    }
}
