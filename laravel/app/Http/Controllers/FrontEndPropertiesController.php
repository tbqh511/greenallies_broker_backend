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

        $legals = [];
        $legalsParameter = Parameter::find(config('global.legal')); // Lấy bản ghi theo config
        if ($legalsParameter) {
            // Kiểm tra nếu $legalsParameter->type_values là một chuỗi JSON hợp lệ trước khi decode
            if (is_string($legalsParameter->type_values)) {
                $legals = json_decode($legalsParameter->type_values, true);
            } else {
                // Xử lý nếu không phải chuỗi JSON hợp lệ
                // Ví dụ: Ghi log hoặc thông báo lỗi
            }
        }

        
        // Get search parameters
        $id = $request->input('id');
        $categoryInput = $request->input('category');
        $wardInput = $request->input('ward');
        $streetInput = $request->input('street');
        $text = $request->input('text');
        $propertyType = $request->input('propery_type');

        // Query to fetch properties based on search parameters
        $propertiesQuery = Property::query();

        // Add conditions to query based on search parameters
        if (!empty($categoryInput)) {
            $propertiesQuery->where('category_id', $categoryInput);
        }

        if (!empty($wardInput)) {
            $propertiesQuery->where('ward_code', $wardInput);
        }

        if (!empty($streetInput)) {
            $propertiesQuery->where('street_code', $streetInput);
        }

        if (!empty($text)) {
            // Tách chuỗi code thành các phần
            $parts = explode('_', $text);
            // Lấy id từ phần tử cuối cùng của mảng parts
            $id = end($parts);
            $propertiesQuery->where('id', $id);
        }

        if (!empty($propertyType)) {
            if ($propertyType === '1') {
                // Xử lý khi người dùng chọn "Cho Thuê"
                $propertiesQuery->where('propery_type', 1);
            } elseif ($propertyType === '0') {
                // Xử lý khi người dùng chọn "Bán"
                $propertiesQuery->where('propery_type', 0);
            } else {
                // Xử lý khi người dùng chọn "Cho thuê & Bán"
                // Không cần thêm điều kiện gì vì đã xử lý các trường hợp này trước đó
            }
        }
        // Get the list of products based on the query
        $properties = $propertiesQuery->paginate(6);

        dd($legals);
        // dd($legalParameter->type_values);
        // // Kiểm tra xem $legalsParameter có tồn tại và có dữ liệu không
        // if ($legalsParameter && $legalsParameter->isNotEmpty()) {
        //     // Duyệt qua mỗi phần tử trong collection và truy cập thuộc tính type_values
        //     foreach ($legalsParameter as $legalParameter) {
        //         if ($legalParameter->type_values) {
        //             dd($legalParameter->type_values);
        //         }
        //     }
        // } else {
        //     // Xử lý khi không có dữ liệu trong $legalsParameter hoặc $legalsParameter không tồn tại
        //     // Ví dụ:
        //     dd('Không có dữ liệu hoặc $legalsParameter không tồn tại.');
        // }
        

        // Define the search result message
        $searchResult = $this->generateSearchResultMessage($categoryInput, $wardInput, $streetInput);

        // Pass the properties and search result message to the view
        return view('frontend_properties_listing', compact('properties', 'searchResult','locationsStreets','locationsWards','categories','legals'));
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
