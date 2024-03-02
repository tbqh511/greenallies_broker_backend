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
        $locationsStreets = LocationsStreet::all();

        $districtCode = config('location.district_code');
        if ($districtCode != null) {
            $locationsWards = LocationsWard::where('district_code', $districtCode)->get();
        } else {
            $locationsWards = LocationsWard::all();
        }
            $categories = Category::all();

        $offset = 0;
        $limit = 10;
        $sort = 'updated_at';
        $order = 'DESC';

        //  $newestProducts = Product::with('locationsStreet', 'locationsWard')->latest()->take(6)->get();
        $sql = Property::with('category')->with('customer')->with('assignParameter.parameter')->with('interested_users')->orderBy($sort, $order);
        $sql->skip($offset)->take($limit);
        $newestProducts = $sql->get();
        

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
