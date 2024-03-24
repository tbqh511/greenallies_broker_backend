<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\parameter;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\LocationsStreet;
use App\Models\LocationsWard;
use App\Models\ProductType;
use App\Models\Product;
use PHPUnit\Framework\MockObject\Rule\Parameters;

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
        // Get the list of streets in the areas
        $locationsStreets = LocationsStreet::all();

        // Get the district code from configuration
        $districtCode = config('location.district_code');
        // If there's a district code, get the list of wards in that district
        $locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->get()->sortBy('full_name') : LocationsWard::all();

        // Get the list of product categories sorted by category in ascending order
        $categories = Category::orderBy('category')->get();

        // get the list legals of properties         
        $legalsParameter = Parameter::find(config('global.legal')); // Lấy bản ghi theo config
        $legals = $legalsParameter->type_values;

        // get the list directions of properties         
        $directionsParameter = Parameter::find(config('global.direction')); // Lấy bản ghi theo config
        $directions = $directionsParameter->type_values;

        // Get search parameters
        $idInput = $request->input('_token');
        $categoryInput = $request->input('category');
        $wardInput = $request->input('ward');
        $streetInput = $request->input('street');
        $textInput = $request->input('text');
        $propertyTypeInput = $request->input('propery_type');

        $priceRangeInput = $request->input('price-range2');
        $legalInput = $request->input('legal');
        $directionInput = $request->input('direction');
        $areaInput = $request->input('area');
        $numberFloorInput = $request->input('number_floor');
        $numberRoomInput = $request->input('number_room');

        dd($priceRangeInput);
        // Query to fetch properties based on search parameters
        $propertiesQuery = Property::query();
        // Add conditions to query based on search parameters
        if (!empty($priceRangeInput)) {
            // Tách giá trị thành mảng các khoảng giá
            $priceRanges = explode(';', $priceRangeInput);
            // Lấy giá trị tối thiểu và tối đa của khoảng giá
            $minPrice = $priceRanges[0];
            $maxPrice = $priceRanges[1];
            // Thêm điều kiện vào truy vấn để lấy các bất động sản trong khoảng giá
            $propertiesQuery->whereBetween('price', [$minPrice, $maxPrice]);
        }
        

        if (!empty($categoryInput)) {
            $propertiesQuery->where('category_id', $categoryInput);
        }

        if (!empty($wardInput)) {
            $propertiesQuery->where('ward_code', $wardInput);
        }

        if (!empty($streetInput)) {
            $propertiesQuery->where('street_code', $streetInput);
        }

        if (!empty($textInput)) {
            // Tách chuỗi code thành các phần
            $parts = explode('_', $textInput);
            // Lấy id từ phần tử cuối cùng của mảng parts
            $idInput = end($parts);
            $propertiesQuery->where('id', $idInput);
        }

        if (!empty($propertyTypeInput)) {
            if ($propertyTypeInput === '1') {
                // Xử lý khi người dùng chọn "Cho Thuê"
                $propertiesQuery->where('propery_type', 1);
            } elseif ($propertyTypeInput === '0') {
                // Xử lý khi người dùng chọn "Bán"
                $propertiesQuery->where('propery_type', 0);
            } else {
                // Xử lý khi người dùng chọn "Cho thuê & Bán"
                // Không cần thêm điều kiện gì vì đã xử lý các trường hợp này trước đó
            }
        }

        if (!empty($priceRangeInput)) {
            // Tách giá trị thành mảng các khoảng giá
            $priceRanges = explode(';', $priceRangeInput);
            // Lấy giá trị tối thiểu và tối đa của khoảng giá
            $minPrice = $priceRanges[0];
            $maxPrice = $priceRanges[1];
            // Thêm điều kiện vào truy vấn để lấy các bất động sản trong khoảng giá
            if ($maxPrice == config('global.max_price')) {
                // Truy vấn các bất động sản có giá lớn hơn $minPrice
                $propertiesQuery->where('price', '>', $minPrice);
            } else {
                // Truy vấn các bất động sản trong khoảng giá từ $minPrice đến $maxPrice
                $propertiesQuery->whereBetween('price', [$minPrice, $maxPrice]);
            }
        }
        
        // Get the list of products based on the query
        $properties = $propertiesQuery->paginate(6);

        // Define the search result message
        $searchResult = $this->generateSearchResultMessage($categoryInput, $wardInput, $streetInput);

        // Pass the properties and search result message to the view
        return view('frontend_properties_listing', compact('properties', 'searchResult','locationsStreets','locationsWards','categories','legals','directions'));
    }

    private function generateSearchResultMessage($categoryInput, $wardInput, $streetInput)
    {
        $searchResult = "Kết quả cho: ";

        if (!empty($categoryInput)) {
            $category = Category::find($categoryInput);
            if ($category) {
                $searchResult .= $category->category . ", ";
            }
        }

        if (!empty($streetInput)) {
            $street = LocationsStreet::where('code', $streetInput)->first();
            if ($street) {
                $searchResult .= 'đường ' . $street->street_name . ", ";
            }
        }

        if (!empty($wardInput)) {
            $ward = LocationsWard::where('code', $wardInput)->first();
            if ($ward) {
                $searchResult .= $ward->full_name . ", ";
            }
        }

        // Loại bỏ ký tự phẩy và khoảng trắng cuối cùng
        $searchResult = rtrim($searchResult, ", ");

        // Thêm chuỗi đuôi
        //dd($searchResult );
        if ($searchResult == "Kết quả cho:")
            $searchResult = "Kết quả cho: Tp Đà Lạt";
        else
            $searchResult .= ", Tp Đà Lạt";

        return $searchResult;
    }

    /**
     * Get street suggestions for autocomplete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocompleteStreet(Request $request)
    {
        $term = $request->input('term');

        // Query the streets based on the search term
        $streets = LocationsStreet::where('street_name', 'like', '%' . $term . '%')->pluck('street_name');

        return response()->json($streets);
    }
}
