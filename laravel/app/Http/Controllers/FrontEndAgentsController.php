<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LocationsWard;
use Illuminate\Http\Request;

class FrontEndAgentsController extends Controller
{
    ///*** Display the detail of a property by its ID.*/
    public function getAgentById(int $id)
    {
        // // Fetch the property based on the ID
        // $property = Property::findOrFail($id);

        // // Set parameters for the product query
        // $offset = 0;
        // $limit = 6;
        // $sort = 'updated_at';
        // $order = 'DESC';
        
        // $newestProperties = Property::with('customer')
        //     ->with('user')
        //     ->with('category:id,category,image')
        //     ->with('assignfacilities.outdoorfacilities')
        //     ->with('favourite')
        //     ->with('parameters')
        //     ->with('interested_users')
        //     ->with('ward')
        //     ->with('street')
        //     ->with('host')
        //     ->orderBy($sort, $order)
        //     ->skip($offset)
        //     ->take($limit)
        //     ->get();

        // // Return the property detail view with the necessary data
        // return view('frontend_properties_detail', [
        //     'property' => $property,
        //     'newestProperties' => $newestProperties,
        // ]);

        // Get the district code from configuration
        $districtCode = config('location.district_code');
        // If there's a district code, get the list of wards in that district
        $locationsWards = ($districtCode != null) ? LocationsWard::where('district_code', $districtCode)->get()->sortBy('full_name') : LocationsWard::all();


        $categories = Category::orderBy('category')->get();

        return view('frontend_agents_detail',[
            'categories' => $categories,
            'locationsWards' => $locationsWards,
        ]);
    }

    /**
     * Display a listing of the properties with search variables: category, ward, street, id.
     */
    public function index(Request $request)
    {
        // // Get search parameters
        // $category = $request->input('category');
        // $ward = $request->input('ward');
        // $street = $request->input('street');
        // $id = $request->input('id');

        // // Query to fetch properties based on search parameters
        // $propertiesQuery = Property::query();

        // if ($category) {
        //     $propertiesQuery->where('category_id', $category);
        // }

        // if ($ward) {
        //     $propertiesQuery->where('ward_id', $ward);
        // }

        // if ($street) {
        //     $propertiesQuery->where('street_id', $street);
        // }

        // if ($id) {
        //     $propertiesQuery->where('id', $id);
        // }

        // // Get the list of properties based on the query
        // $properties = $propertiesQuery->paginate(6);

        // // Return the property list view with the necessary data
        // return view('frontend_properties_listing', ['properties' => $properties]);

         return view('frontend_agents_listing');
    }
}
