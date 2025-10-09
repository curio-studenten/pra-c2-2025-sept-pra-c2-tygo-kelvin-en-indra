<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($name, $manual_id )
    {

        $name = strstr( "+"," ",$name);
        $brand = Brand::where('name',$name)->first();
        $manuals = $brand->manuals;
        $manual = Manual::findOrFail($manual_id);
        $manual->increment('visits');


        return view('pages.manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }
}
