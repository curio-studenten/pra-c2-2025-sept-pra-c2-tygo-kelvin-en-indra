<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
    $name = 'D292003';
    $brands = Brand::all()->sortBy('name');
    $top10Manuals = Manual::orderByDesc('visits')->take(10)->get();
    $categories = Category::with('brands')->get();

    return view('pages.homepage',[
        "name" => $name,
        "brands" => $brands,
        "top10Manuals" => $top10Manuals,
        "categories" => $categories
    ]);
    }
}