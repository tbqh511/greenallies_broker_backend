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
        //$locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->orderBy('full_name')->get() : LocationsWard::orderBy('full_name')->get();
        //$locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->orderByRaw("CAST(SUBSTRING_INDEX(`full_name`, ' ', -1) AS UNSIGNED)")->get() : LocationsWard::orderByRaw("CAST(SUBSTRING_INDEX(`full_name`, ' ', -1) AS UNSIGNED)")->get();
        //$locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->orderByRaw("CAST(SUBSTRING_INDEX(full_name, ' ', -1) AS UNSIGNED), full_name")->get() : LocationsWard::orderByRaw("CAST(SUBSTRING_INDEX(full_name, ' ', -1) AS UNSIGNED), full_name")->get();
        $locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->orderByRaw("CASE 
        WHEN full_name LIKE 'phường%' THEN 1 
        WHEN full_name LIKE 'Xã%' THEN 2 
        ELSE 3 END, full_name")->get() : LocationsWard::orderByRaw("CASE 
        WHEN full_name LIKE 'phường%' THEN 1 
        WHEN full_name LIKE 'Xã%' THEN 2 
        ELSE 3 END, full_name")->get();

        // Get the list of product categories
        $categories = Category::all();

        // Set parameters for the product query
        $offset = 0;
        $limit = 6;
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
            //->where('propery_type','1')
            ->orderBy($sort, $order)
            ->skip($offset)
            ->take($limit)
            ->get();

        //dd($newestProducts[0]->parameters[0]->pivot->pivot_value);
        //dd($newestProducts[0]->parameters[0]->pivot->value);
        // $valueOfParameterId15 = $newestProducts[0]->parameters->where('name', config('global.area'))->first()->pivot->value;
        // dd($valueOfParameterId15);

        //dd($newestProducts[2]->number_floor);
        //dd(config('global.number_floor'));
        //dd($newestProducts);
        
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
