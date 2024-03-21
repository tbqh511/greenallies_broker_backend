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
        return view('frontend_properties_detail', ['property' => $product]);
    }
    /**
     * Display the detail of a property by its ID.
     */
    public function getPropertyById(int $id)
    {
        // Fetch the property based on the ID
        $property = Property::findOrFail($id);
        //dd($property);

        // Set parameters for the product query
        $offset = 0;
        $limit = 5;
        $sort = 'updated_at';
        $order = 'DESC';

        // Lấy loại của property hiện tại
        $category_id = $property->category_id;
        $ward_code = $property->ward_code;


        $relatedProducts = Property::where('category_id', $category_id)
            ->orwhere('ward_code', $ward_code)
            ->where('id', '!=', $property->id) // Loại bỏ sản phẩm hiện tại
            ->with('customer')
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

        // Set parameters for the product query
        $limit = 5;
        $sort = 'total_click'; // Sắp xếp theo số lượt click
        $order = 'DESC';

        $highlightedProducts = Property::orderBy($sort, $order)
            ->take($limit)
            ->get();
        // Tăng giá trị của cột total_click
        $property->increment('total_click');

        //dd(Property::where('added_by', '2')->get()->count());


        // Return the property detail view with the necessary data
        return view('frontend_properties_detail', [
            'property' => $property,
            'relatedProducts' => $relatedProducts,
            'highlightedProducts' => $highlightedProducts,
        ]);
    }

    /**
     * Display a listing of the products with search variables: category, ward, street, id.
     */
    public function index(Request $request)
    {
        // Get search parameters
        $id = $request->input('id');
        $category = $request->input('category');
        $ward = $request->input('ward');
        $street = $request->input('street');

        // Query to fetch properties based on search parameters
        $propertiesQuery = Property::query();

        if ($category) {
            $propertiesQuery->where('category_id', $category);
        }

        if ($ward) {
            $propertiesQuery->where('ward_code', $ward);
        }

        if ($street) {
            $propertiesQuery->where('street_code', $street);
        }

        if ($id) {
            $propertiesQuery->where('id', $id);
        }

        // Get the list of products based on the query
        $properties = $propertiesQuery->paginate(6);

        // Define the search result message
        $searchResult = "Kết quả cho:" . $category . $ward . $street;

        // Pass the properties and search result message to the view
        return view('frontend_properties_listing', ['properties' => $properties, 'searchResult' => $searchResult]);
    }
}
