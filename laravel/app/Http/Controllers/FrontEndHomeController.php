<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationsStreet;
use App\Models\LocationsWard;
use App\Models\ProductType;
use App\Models\Product;

class FrontPageHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationsStreets = LocationsStreet::all();

        $districtCode = config('location.district_code');
        if ($districtCode != null) {
            $locationsWards = LocationsWard::where('district_code', $districtCode)->get();
        } else {
            $locationsWards = LocationsWard::all();
        }

        $productTypes = ProductType::all();
        $newestProducts = Product::with('locationsStreet', 'locationsWard')->latest()->take(6)->get();

        return view('home', [
            'locationsStreets' => $locationsStreets,
            'locationsWards' => $locationsWards,
            'productTypes' => $productTypes,
            'newestProducts' => $newestProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
