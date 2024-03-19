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
        $limit = 6;
        $sort = 'updated_at';
        $order = 'DESC';

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
            
        // Tăng giá trị của cột total_click
        $property->increment('total_click');

        // Lấy các thuộc tính từ $this->parameters
        $propertyAttributes = [
            'Mã BDS' => $property->code,
            'Diện tích' => $property->getAreaAttribute() ? $property->getAreaAttribute() . ' m²' : null,
            'Diện tích sàn' => $property->getFloorAreaAttribute(),
            'Pháp lý' => $property->legal,
            'Hướng' => $property->direction,
            'Đường rộng' => $property->road_width,
            'Giá m2' => $property->price_m2,
            'Số tầng' => $property->number_floor,
            'Phòng ngủ' => $property->number_room,
            'Nhà vệ sinh' => $property->bathroom,
            'Gara đổ xe - chỗ đậu xe' => $property->garage,
            'Hồ bơi' => $property->pool,
            'Nội thất' => $property->furniture,
            'Tình trạng xây dựng' => $property->construction_status,
            'Thời hạn thuê' => $property->rental_period,
        ];


        //$gallery = $property->getGalleryAttribute();
        dd($property->assignParameter());

        // Return the property detail view with the necessary data
        return view('frontend_properties_detail', [
            'property' => $property,
            'newestProducts' => $newestProducts,
            'propertyAttributes' => $propertyAttributes,
        ]);
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

        // Query to fetch properties based on search parameters
        $propertiesQuery = Property::query();

        if ($category) {
            $propertiesQuery->where('category_id', $category);
        }

        if ($ward) {
            $propertiesQuery->where('ward_id', $ward);
        }

        if ($street) {
            $propertiesQuery->where('street_id', $street);
        }

        if ($id) {
            $propertiesQuery->where('id', $id);
        }

        // Get the list of products based on the query
        $properties = $propertiesQuery->paginate(6);

        // Return the product list view with the necessary data
        return view('frontend_properties_listing', ['properties' => $properties]);
    }
}
