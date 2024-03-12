<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\LocationsStreet;
use App\Models\LocationsWard;
use App\Models\ProductType;
use App\Models\Product;

class FrontEndHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the list of streets in the areas
        $locationsStreets = LocationsStreet::all();

        // Get the district code from configuration
        $districtCode = config('location.district_code');
        // If there's a district code, get the list of wards in that district
        $locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->get() : LocationsWard::all();

        // Get the list of product categories
        $categories = Category::all();

        // Set parameters for the product query
        $offset = 0;
        $limit = 9;
        $sort = 'updated_at';
        $order = 'DESC';

        // Get the list of newest products
        $newestProducts = Property::with('customer')
            ->with('user')
            ->with('category:id,category,image')
            ->with('assignfacilities.outdoorfacilities')
            ->with('favourite')
            ->with('parameters')
            ->with('interested_users')
            ->with('ward')
            ->with('street')
            ->with('host')
            ->orderBy($sort, $order)
            ->skip($offset)
            ->take($limit)
            ->get();

        //dd($newestProducts[0]->parameters->assigned_parameter);
        $values = $newestProducts[0]->parameters()[0]->withPivot('value')->get()->pluck('pivot.value');
        dd($values);
        // Return the frontend_home view with the necessary data
        return view('frontend_home', [
            'locationsStreets' => $locationsStreets,
            'locationsWards' => $locationsWards,
            'categories' => $categories,
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
