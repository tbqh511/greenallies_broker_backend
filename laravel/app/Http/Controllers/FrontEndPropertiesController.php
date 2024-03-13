<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\LocationsStreet;
use App\Models\LocationsWard;
use App\Models\ProductType;
use App\Models\Product;

class FrontEndPropertiesController extends Controller
{
    /**
     * Display the detail of a product.
     */
    public function show(string $slug)
    {
        // Fetch the product based on the slug
        $product = Property::where('slug', $slug)->first();

        // Return the product detail view with the necessary data
        return view('product', ['product' => $product]);
    }
/**
 * Display the detail of a property by its ID.
 */
public function getPropertyById(int $id)
{
    // Fetch the property based on the ID
    $property = Property::findOrFail($id);

    // Return the property detail view with the necessary data
    return view('property_detail', ['property' => $property]);
}

    /**
     * Display a listing of the products with search variables: category, ward, street, id.
     */
    public function index(Request $request)
    {
        // Get search parameters
        $category = $request->input('category');
        $ward = $request->input('ward');
        $street = $request->input('street');
        $id = $request->input('id');

        // Query to fetch products based on search parameters
        $productsQuery = Property::query();

        if ($category) {
            $productsQuery->where('category_id', $category);
        }

        if ($ward) {
            $productsQuery->where('ward_id', $ward);
        }

        if ($street) {
            $productsQuery->where('street_id', $street);
        }

        if ($id) {
            $productsQuery->where('id', $id);
        }

        // Get the list of products based on the query
        $products = $productsQuery->paginate(10);

        // Return the product list view with the necessary data
        return view('product_list', ['products' => $products]);
    }
}
