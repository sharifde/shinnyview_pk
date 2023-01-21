<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property_sql = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as cd', 'p.address_id', '=', 'cd.id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'cd.name as address', 'pp.name as purpose', 'pt.name as propertyType');

        // featured properties
        //$property_features = $property_sql->where('p.featured',1)->offset(0)->limit(15)->orderby('id', 'desc')->get();

        // boosted properties
        $property_boosted = $property_sql->where('p.boost', 1)->where('p.is_admin', 1)->offset(0)->limit(15)->orderby('id', 'desc')->get();

        $property_sql_feature = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType');

        // featured properties
        $property_features = $property_sql_feature->where('p.featured', 1)->where('p.is_admin', 1)->offset(0)->limit(15)->orderby('id', 'desc')->get();


        $projects = DB::table('projects as p')
            ->join('cities as c', 'p.city_id', 'c.id')
            ->where('p.status', 'active')
            ->select('p.id', 'p.name', 'p.developer_name', 'p.logo', 'p.image', 'c.name as cityName', 'p.overview', 'p.min_price', 'p.max_price')
            ->inRandomOrder()->offset(0)->limit(8)->get();

        // cities
        // $cities=City::all();
        $cities = City::orderBy('perirty', 'ASC')->get();
        // $cities = DB::table('cities as c')
        //     ->join('properties as p', 'c.id', '=', 'p.city_id')
        //     ->select('c.id', 'c.name')
        //     ->distinct()
        //     ->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        $prime_dealers = DB::table('prime_dealers')
            ->where('status', 'active')
            ->select('id', 'name', 'logo', 'phone_1', 'phone_2', 'phone_3')
            ->get();

        // $posts = DB::connection('mysql_blog')->table('sb_posts')
        // ->select('ID','post_title','post_date','post_name')
        // ->where('post_type', 'post')
        // ->where('post_status', 'publish')
        // ->inRandomOrder()
        // ->offset(0)->limit(3)
        // ->get();

        $advertisment = DB::table('advertisment')->where('status', 'active')->get();

        $data = array(
            'property_features' => $property_features,
            'property_boosted' => $property_boosted,
            'cities' => $cities,
            'purpose' => $purpose,
            'projects' => $projects,
            'prime_dealers' => $prime_dealers,
            // 'posts' => $posts,
            'advertisment' => $advertisment
        );

        return view('frontend.index', $data);
    }


    public function searchProperty()
    {
        $segmentOne =  Request()->segment(1);
        $segment =  Request()->segment(2);
        $searchOne = request()->query('searchType');
        $searchTypeTwo = request()->query('searchTypeTwo');
        $searchTypeThree = request()->query('searchTypeThree');
        $title = 'Shinnyview.com: Pakistan’s Best Property Website - Buy, Rent And Sell Properties anywhere in Pakistan';
        $description = 'Shinnyview.com: Pakistan’s Best Property Website. Now buy, rent and sell houses, plots, shops, flats easily in Pakistan.';
        $segmentArray = explode("-", $segment);
        $firstObject =  isset($segmentArray[0]) ? $segmentArray[0] : "";
        $secondObject =  isset($segmentArray[2]) ? $segmentArray[2] : "";
        $data[] = '';
        if ($secondObject == 'sale' && $segmentOne == 'residential' && $firstObject == 'house') {

            $title = "Houses For Sale in Pakistan | Buy Homes In Karachi, Lahore, Islamabad, Peshawar, Quetta";
            $description = "Want to buy your dream house in Pakistan? Search homes according to your needs anywhere in Pakistan.";
            $data['searchType'] = '1';   ///// 1 for sale, 2 for rent , 3 for lease
            $data['searchTypeTwo'] = '1'; ///// 1 for residentail, 2 for Commerical , 3 for plot
            $data['searchTypeThree'] = '1'; ///// other propetry////
        } elseif ($secondObject == 'sale' && $segmentOne == 'residential' && $firstObject == 'apartment') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '1';
            $data['searchTypeThree'] = '2';
        } elseif ($secondObject == 'sale' && $segmentOne == 'residential' && $firstObject == 'plot') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '1';
            $data['searchTypeThree'] = '16';
        } elseif ($secondObject == 'sale' && $segmentOne == 'residential' && $firstObject == 'farmhouse') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '1';
            $data['searchTypeThree'] = '5';
        } elseif ($secondObject == 'sale' && $segmentOne == 'commercial' && $firstObject == 'office') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '9';
        } elseif ($secondObject == 'sale' && $segmentOne == 'commercial' && $firstObject == 'shop') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '10';
        } elseif ($secondObject == 'sale' && $segmentOne == 'commercial' && $firstObject == 'warehouse') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '11';
        } elseif ($secondObject == 'sale' && $segmentOne == 'commercial' && $firstObject == 'plot') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '16';
        } elseif ($secondObject == 'sale' && $segmentOne == 'commercial' && $firstObject == 'builing') {
            $data['searchType'] = '1';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '13';
        } elseif ($secondObject == 'rent' && $segmentOne == 'residential' && $firstObject == 'house') { //////// RENT/////////
            $title = "Houses For Rent in Pakistan | Buy Homes In Karachi, Lahore, Islamabad, Peshawar, Quetta";
            $description = "Want to rent house in Pakistan? Search homes according to your needs anywhere in Pakistan.";
            $data['searchType'] = '2';   ///// 1 for sale, 2 for rent , 3 for lease
            $data['searchTypeTwo'] = '1'; ///// 1 for residentail, 2 for Commerical , 3 for plot
            $data['searchTypeThree'] = '1'; ///// other propetry////
        } elseif ($secondObject == 'rent' && $segmentOne == 'residential' && $firstObject == 'apartment') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '1';
            $data['searchTypeThree'] = '2';
        } elseif ($secondObject == 'rent' && $segmentOne == 'residential' && $firstObject == 'farmhouse') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '5';
        } elseif ($secondObject == 'rent' && $segmentOne == 'residential' && $firstObject == 'room') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '1';
            $data['searchTypeThree'] = '17';
        } elseif ($secondObject == 'rent' && $segmentOne == 'commercial' && $firstObject == 'office') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '9';
        } elseif ($secondObject == 'rent' && $segmentOne == 'commercial' && $firstObject == 'shop') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '10';
        } elseif ($secondObject == 'rent' && $segmentOne == 'commercial' && $firstObject == 'builing') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '13';
        } elseif ($secondObject == 'rent' && $segmentOne == 'commercial' && $firstObject == 'warehouse') {
            $data['searchType'] = '2';
            $data['searchTypeTwo'] = '2';
            $data['searchTypeThree'] = '11';
        } elseif ($segment == 'lease' && $segmentOne == 'residential') { //////// LEASE/////////
            $data['searchType'] = '3';   ///// 1 for sale, 2 for rent , 3 for lease
            $data['searchTypeTwo'] = '1'; ///// 1 for residentail, 2 for Commerical , 3 for plot
        } elseif ($segment == 'lease' && $segmentOne == 'commercial') {
            $data['searchType'] = '3';
            $data['searchTypeTwo'] = '2';
        } elseif ($segment == 'lease' && $segmentOne == 'residential') { //////// LAND/////////
            $data['searchType'] = '3';   ///// 1 for sale, 2 for rent , 3 for lease
            $data['searchTypeTwo'] = '1'; ///// 1 for residentail, 2 for Commerical , 3 for plot
        } elseif ($segment == 'lease' && $segmentOne == 'commercial') {
            $data['searchType'] = '3';
            $data['searchTypeTwo'] = '2';
        } elseif ($segment == 'land' && $segmentOne == 'commercial') {
            $data['searchTypeThree'] = '14';
        } elseif ($segment == 'islamabad' && $segmentOne == 'city') { //////// CITIES/////////
            $data['city'] = '1';
        } elseif ($segment == 'karachi' && $segmentOne == 'city') {
            $data['city'] = '3';
        } elseif ($segment == 'lahore' && $segmentOne == 'city') {
            $data['city'] = '4';
        } elseif ($segment == 'quetta' && $segmentOne == 'city') {
            $data['city'] = '5';
        } elseif ($segment == 'multan' && $segmentOne == 'city') {
            $data['city'] = '6';
        } elseif ($segment == 'sialkot' && $segmentOne == 'city') {
            $data['city'] = '7';
        } elseif ($segment == 'peshawar' && $segmentOne == 'city') {
            $data['city'] = '8';
        } elseif ($segment == 'gawadar' && $segmentOne == 'city') {
            $data['city'] = '13';
        } elseif ($segment == 'gujranwala' && $segmentOne == 'city') {
            $data['city'] = '12';
        } elseif ($segment == 'bahawalpur' && $segmentOne == 'city') {
            $data['city'] = '11';
        } elseif ($segment == 'chakwal' && $segmentOne == 'city') {
            $data['city'] = '10';
        } elseif ($segment == 'jhelum' && $segmentOne == 'city') {
            $data['city'] = '9';
        }

        // if($searchOne == '1' && $searchTypeThree == '1'){
        //     $title = "Houses For Sale in Pakistan | Buy Homes In Karachi, Lahore, Islamabad, Peshawar, Quetta";
        //     $description = "Want to buy your dream house in Pakistan? Search homes according to your needs anywhere in Pakistan.";
        // }elseif($searchOne == '1' && $searchTypeThree == '2'){
        //     $title = "Flats For Sale In Pakistan | Buy Apartment In Islamabad, Karachi, Lahore, Peshawar, Quetta";
        //     $description = "Flat for Sale In Pakistan, search and buy apartments in Islamabad, Karachi, Lahore, Peshawar, Quetta";
        // }elseif($searchOne == '1' && $searchTypeTwo == '3'){
        //     $title = "Buy Residential Plots in Pakistan | Search Plots Near You in All Major Cities.";
        //     $description = "Secure your future, buy residential plots in Pakistan. Search plots near you in all cities of Pakistan with shinnyview.com";
        // }elseif($searchOne == '1' && $searchTypeTwo == '5'){
        //     $title = "Search Farmhouse For Sale In Pakistan | Check Luxury Farmhouses Prices In Pakistan";
        //     $description = "For nature lovers, shinnyview has a list of beautiful list of luxury farmhouses in Pakistan. Search and find farmhouses prices in Pakistan";
        // }

        return view('frontend.property_result', compact('title', 'description', 'data'));
    }

    // Boosted properties listing
    public function getBoostProperties(Request $r)
    {

        $city = $r->city;
        $purpose = $r->purpose;
        $subtype = $r->subtype;
        $beds = $r->beds;
        $baths = $r->baths;
        $min = $r->min;
        $max = $r->max;

        // properties
        $filtersSQL = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as cd', 'p.address_id', '=', 'cd.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'cd.name as address', 'pp.name as purpose', 'pt.name as propertyType');

        if ($city != '')  $properties = $filtersSQL->where('p.city_id', $city);
        if ($purpose != '') $properties = $filtersSQL->where('p.purpose_id', $purpose);
        if ($subtype != '') $properties = $filtersSQL->where('p.purpose_type_inner_id', $subtype);
        if ($beds != '') $properties = $filtersSQL->where('p.bedroom', '=', $beds);
        if ($baths != '') $properties = $filtersSQL->where('p.bath', '=', $baths);
        if ($min != '') $properties = $filtersSQL->where('p.price', '>=', $min);
        if ($max != '') $properties = $filtersSQL->where('p.price', '<=', $max);

        $properties = $filtersSQL->where('p.status', 1)->where('p.is_admin', 1)->orderby('p.id', 'desc')->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'scity' => $r->city,
            'spurpose' => $r->purpose,
            'ssubtype' => $r->subtype,
            'sbeds' => $r->beds,
            'sbaths' => $r->baths,
            'smin' => $r->min,
            'smax' => $r->max
        );

        return view('frontend.boost-property', $data);
    }

    // Featured properties listing
    public function getFeaturedProperties(Request $r)
    {

        $city = $r->city;
        $purpose = $r->purpose;
        $subtype = $r->subtype;
        $beds = $r->beds;
        $baths = $r->baths;
        $min = $r->min;
        $max = $r->max;

        // properties
        $filtersSQL = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as cd', 'p.address_id', '=', 'cd.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'cd.name as address', 'pp.name as purpose', 'pt.name as propertyType');

        if ($city != '')  $properties = $filtersSQL->where('p.city_id', $city);
        if ($purpose != '') $properties = $filtersSQL->where('p.purpose_id', $purpose);
        if ($subtype != '') $properties = $filtersSQL->where('p.purpose_type_inner_id', $subtype);
        if ($beds != '') $properties = $filtersSQL->where('p.bedroom', '=', $beds);
        if ($baths != '') $properties = $filtersSQL->where('p.bath', '=', $baths);
        if ($min != '') $properties = $filtersSQL->where('p.price', '>=', $min);
        if ($max != '') $properties = $filtersSQL->where('p.price', '<=', $max);

        $properties = $filtersSQL->where('p.status', 1)->where('p.is_admin', 1)->where('p.featured', 1)->orderby('p.id', 'desc')->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'scity' => $r->city,
            'spurpose' => $r->purpose,
            'ssubtype' => $r->subtype,
            'sbeds' => $r->beds,
            'sbaths' => $r->baths,
            'smin' => $r->min,
            'smax' => $r->max
        );

        return view('frontend.featured-property', $data);
    }




    // properties listing
    public function getPropertiesListings(Request $r)
    {

        $city = $r->city;
        $purpose = $r->purpose;
        $subtype = $r->subtype;
        $beds = $r->beds;
        $baths = $r->baths;
        $min = $r->min;
        $max = $r->max;
        $search = $r->search;

        // properties
        $filtersSQL = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as cd', 'p.address_id', '=', 'cd.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'cd.name as address', 'pp.name as purpose', 'pt.name as propertyType');

        if ($city != '')  $properties = $filtersSQL->where('p.city_id', $city);
        if ($purpose != '') $properties = $filtersSQL->where('p.purpose_id', $purpose);
        if ($subtype != '') $properties = $filtersSQL->where('p.purpose_type_inner_id', $subtype);
        if ($beds != '') $properties = $filtersSQL->where('p.bedroom', '=', $beds);
        if ($baths != '') $properties = $filtersSQL->where('p.bath', '=', $baths);
        if ($min != '') $properties = $filtersSQL->where('p.price', '>=', $min);
        if ($max != '') $properties = $filtersSQL->where('p.price', '<=', $max);
        if ($search != '') $properties = $filtersSQL->where('cd.name', 'LIKE', "%{$search}%");

        $properties = $filtersSQL->where('p.status', 1)->where('p.is_admin', 1)->orderby('p.id', 'desc')->paginate(12);

        $count_properties = $filtersSQL->where('p.status', 1)->where('p.is_admin', 1)->orderby('p.id', 'desc')->count();

        $p_count = $count_properties;
        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'scity' => $r->city,
            'spurpose' => $r->purpose,
            'ssubtype' => $r->subtype,
            'sbeds' => $r->beds,
            'sbaths' => $r->baths,
            'smin' => $r->min,
            'smax' => $r->max,
            'c_search' => $r->search,
            'p_count' => $p_count,
            'seo_title' => "Shinnyview.com is Pakistan's Best Property Website.",
            'seo_description' => "Shinnyview.com is Pakistan's Best Property Website, Allowing You to Buy, Rent, and Sell Properties across Pakistan."
        );

        return view('frontend.properties_listing', $data);
    }

    public function getAutocomplete(Request $request)
    {

        if ($request->ajax()) {
            // select country name from database
            $data = DB::table('city_address')
                ->select('id', 'city_id', 'name')
                ->where('city_id', $request->cid)
                ->where('name', 'like',  $request->search . '%')
                ->groupBy('name')
                //->limit(15)
                ->orderby('name', 'asc')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: absolute; margin-left:20px; cursor: pointer; z-index: 1; width:90%;">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li style="margin-left: 15%;" class="list-group-item s-select s-loc">' . $row->name . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            // return output result array
            return $output;
        }
    }

    public function getAutocompletehome(Request $request)
    {

        if ($request->ajax()) {
            // select country name from database
            $data = DB::table('city_address')
                ->select('id', 'city_id', 'name')
                ->where('city_id', $request->cid)
                ->where('name', 'like',  $request->search . '%')
                ->groupBy('name')
                //->limit(15)
                ->orderby('name', 'asc')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="position: absolute; margin-left:70px; cursor: pointer; z-index: 1; width:100%;">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li style="margin-left: 15%;" class="list-group-item s-select s-loc">' . $row->name . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            // return output result array
            return $output;
        }
    }

    // get type properties
    public function getTypePropertiesListing($type, $id)
    {
        // properties
        $properties = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')
            ->where('p.purpose_id', $id)
            ->where('p.is_admin', 1)
            ->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'purpose_id' => $id,
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'c_search' => '',
            'p_count' => '',
            'seo_title' => "Property House, Plot, Flat, Apartment for sale Shinnyview.com",
            'seo_description' => "Property House, Plot, Flat, Apartment for sale Shinnyview.com. Find the best house for sale at an affordable price in your area - shinnyview.com"
        );

        return view('frontend.properties_listing', $data);
    }


    // get sale properties
    public function getSalePropertiesListing($id, $type, $sid)
    {
        // properties
        $properties = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')
            ->where('p.purpose_id', 1)
            ->where('p.property_type_id', $id) // residential/commercial
            ->where('p.purpose_type_inner_id', $sid)
            ->where('p.is_admin', 1)
            ->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'purpose_id' => 1,
            'type_id' => $id,
            'sub_type_id' => $sid,
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'c_search' => '',
            'p_count' => '',
            'seo_title' => "Listing of  House, Apartment, Plot, Office, Shop, WareHouse, Farm for sale shinnyview.com",
            'seo_description' => "Listing of  house, Apartment, Plot, Farm for sale shinnyview.com. Find the best House, Apartment, Plot, Office, Shop, WareHouse, Farm for sale at an affordable price in your area - shinnyview.com"
        );

        return view('frontend.properties_listing', $data);
    }

    // get rent properties
    public function getRentPropertiesListing($id, $type, $sid)
    {
        // properties
        $properties = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')
            ->where('p.purpose_id', 2)
            ->where('p.property_type_id', $id) // residential/commercial
            ->where('p.purpose_type_inner_id', $sid)
            ->where('p.is_admin', 1)
            ->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'c_search' => '',
            'p_count' => '',
            'seo_title' => "Listing of  House, Apartment, Plot, Office, Shop, WareHouse, Farm for Rent shinnyview.com",
            'seo_description' => "Listing of  house, Apartment, Plot, Farm for sale shinnyview.com. Find the best House, Apartment, Plot, Office, Shop, WareHouse, Farm for Rent at an affordable price in your area - shinnyview.com"
        );

        return view('frontend.properties_listing', $data);
    }

    // get lease properties
    public function getLeasePropertiesListing($id, $type)
    {
        // properties
        $properties = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')
            ->where('p.purpose_id', 3)
            ->where('p.property_type_id', $id) // residential/commercial
            ->where('p.is_admin', 1)
            ->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $data = array(
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'c_search' => '',
            'p_count' => '',
            'seo_title' => "Listing of  House, Apartment, Plot, Office, Shop, WareHouse, Farm for Lease shinnyview.com",
            'seo_description' => "Listing of  house, Apartment, Plot, Farm for sale shinnyview.com. Find the best House, Apartment, Plot, Office, Shop, WareHouse, Farm for Lease at an affordable price in your area - shinnyview.com"
        );

        return view('frontend.properties_listing', $data);
    }

    // get city properties
    public function getCityPropertiesListing($cityid, $cname)
    {
        // properties
        $properties = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')

            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id', 'pst.title as property_type_name', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')
            ->where('p.city_id', $cityid)
            ->where('p.is_admin', 1)
            ->paginate(12);

        // cities
        $cities = DB::table('cities as c')->join('properties as p', 'c.id', '=', 'p.city_id')->select('c.id', 'c.name')->distinct()->get();

        // property purpose
        $purpose = DB::table('property_purpose')->get();

        // beds
        $beds = DB::table('properties')->where('bedroom', '!=', '')->where('bedroom', '!=', 0)->select('bedroom')->orderby('bedroom', 'asc')->distinct()->get();

        // bath
        $bath = DB::table('properties')->where('bath', '!=', '')->where('bath', '!=', 0)->select('bath')->orderby('bath', 'asc')->distinct()->get();

        $count_properties =  DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')

            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->join('property_sub_types as pst', 'p.purpose_type_inner_id', '=', 'pst.id')
            ->select('p.id')
            ->where('p.city_id', $cityid)
            ->where('p.is_admin', 1)
            ->where('p.status', 1)
            ->count();

        $p_count = $count_properties;

        $data = array(
            'cityid' => $cityid,
            'properties' => $properties,
            'cities' => $cities,
            'purpose' => $purpose,
            'beds' => $beds,
            'bath' => $bath,
            'c_search' => $cname,
            'p_count' => count($properties),
            'scity' => $cityid,
            'c_search' => '',
            'p_count' => $p_count,
            'seo_title' => "Listing of property in " . $cname . " shinnyview.com",
            'seo_description' => "Listing of  houses, Plot for Buy, Sale or Rent. Find the best Residential, Commercial, house, apartment, flat for sale, rent at an affordable price in " . $cname . " - shinnyview.com"
        );

        return view('frontend.properties_listing', $data);
    }

    // searchProperties
    public function searchProperties(Request $r)
    {
        $city = $r->city;
        $purpose = $r->purpose;
        $beds = $r->beds;
        $baths = $r->baths;
        $min = $r->min;
        $max = $r->max;

        // properties
        $filtersSQL = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->select('p.id', 'p.name', 'p.slug', 'p.image', 'p.featured', 'p.boost', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType')->where('p.is_admin', 1);


        if ($city != '') {
            $properties = $filtersSQL->where('p.city_id', 'like', '%' . $city . '%');
        }
        if ($purpose != '') {
            $properties = $filtersSQL->where('p.purpose_id', 'like', '%' . $purpose . '%');
        }
        if ($beds != '') {
            $properties = $filtersSQL->where('p.bedroom', '=', $beds);
        }
        if ($baths != '') {
            $properties = $filtersSQL->where('p.bath', '=', $baths);
        }
        if ($min != '') {
            $properties = $filtersSQL->where('p.price', '>=', $min);
        }
        if ($max != '') {
            $properties = $filtersSQL->where('p.price', '<=', $max);
        }

        $total = $filtersSQL->count();
        if ($total > 0) {
            $properties = $filtersSQL->orderby('p.id', 'desc')->Paginate(12);
            // $properties = $filtersSQL->get();

            $data = array(
                'properties' => $properties,
                'seo_title' => "Shinnyview.com is Pakistan's Best Property Website.",
                'seo_description' => "Shinnyview.com is Pakistan's Best Property Website, Allowing You to Buy, Rent, and Sell Properties across Pakistan."
            );
            return view('components.fields.properties.search-properties', $data);
        }
    }

    public function searchFitlerProperty()
    {
        return view('frontend.property_filter_result');
    }

    public function propertyDetail($id = null)
    {
        $property_details = Property::where('slug', $id)->where('p.is_admin', 1)->with('gallery')->with('user')->with('city')->with('city_address')->first();
        $property_similar = Property::where('purpose_id', $property_details->purpose_id)->where('p.is_admin', 1)->with('gallery')->with('user')->with('city')->with('city_address')->limit(2)->orderBy('created_at', 'desc')->get();
        $property_boost = Property::where('purpose_id', $property_details->purpose_id)->where('p.is_admin', 1)->where('boost', 1)->with('gallery')->with('user')->with('city')->limit(3)->orderBy('created_at', 'desc')->get();
        $featured_property = Property::where('purpose_id', $property_details->purpose_id)->where('p.is_admin', 1)->where('featured', 1)->with('gallery')->with('user')->with('city')->limit(3)->orderBy('created_at', 'desc')->get();


        // users properties
        $userID = $property_details->user_id;
        $user_property = Property::where('user_id', $userID)
            ->with('gallery')
            ->with('user')
            ->with('city')
            ->with('city_address')
            ->limit(4)
            ->orderBy('created_at', 'desc')
            ->get();

        // property type
        $property_typeID = $property_details->property_type_id;
        $property_type_name = DB::table('property_type')
            ->where('id', $property_typeID)
            ->first();

        // property purpose
        $property_purposeID = $property_details->property_purpose_id;
        $property_purpose_name = DB::table('property_purpose')
            ->where('id', $property_typeID)
            ->first();


        $data['property_details'] = $property_details;
        $data['property_similar'] = $property_similar;
        $data['property_boost'] = $property_boost;
        $data['featured_property'] = $featured_property;
        $data['user_property'] = $user_property;
        $data['property_type_name'] = $property_type_name;
        $data['property_purpose_name'] = $property_purpose_name;
        return view('frontend.property_detail', $data);
    }

    // get Dealer Properties
    public function getDealerProperties($id)
    {
        $dealer = DB::table('users')
            ->select('number', 'name', 'company', 'email')
            ->where('id', $id)
            ->first();

        // properties
        $property_sql = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->select(
                'p.id',
                'p.name',
                'p.slug',
                'p.image',
                'p.featured',
                'p.boost',
                'p.price',
                'p.area',
                'p.garage',
                'p.bedroom',
                'p.bath',
                'p.size',
                'c.name as city',
                'pp.name as purpose',
                'pt.name as propertyType'
            )->where('p.is_admin', 1)->where('p.status', 1);
        // all properties of dealer
        $dealer_properties = $property_sql->where('p.user_id', $id)->Paginate(4);
        // dealer boosted properties
        $d_boosted_properties = $property_sql->where('p.user_id', $id)->where('p.boost', '1')->Paginate(4);
        // dealer featured properties
        $d_featured_properties = $property_sql->where('p.user_id', $id)->where('p.featured', '1')->Paginate(4);

        // count all properties
        $all_properties = DB::table('properties')->where('user_id', $id)->count();
        // count featured properties
        $featured_properties = DB::table('properties')->where('user_id', $id)->where('featured', '1')->count();
        // count boosted properties
        $boosted_properties = DB::table('properties')->where('user_id', $id)->where('boost', '1')->count();

        // users properties
        // $userID = $property_details->user_id;
        $user_property = Property::where('user_id', $id)
            ->with('gallery')
            ->with('user')
            ->with('city')
            ->with('city_address')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = array(
            'dealer' => $dealer,
            'dealer_properties' => $dealer_properties,
            'd_boosted_properties' => $d_boosted_properties,
            'd_featured_properties' => $d_featured_properties,
            'all_properties' => $all_properties,
            'featured_properties' => $featured_properties,
            'boosted_properties' => $boosted_properties,
            'seo_title' => "Shinnyview.com is Pakistan's Best Property Website.",
            'seo_description' => "Shinnyview.com is Pakistan's Best Property Website, Allowing You to Buy, Rent, and Sell Properties across Pakistan."
        );

        return view('frontend.dealer-singleProperty', $data);
    }

    // view property
    public function viewProperty($id)
    {
        $property = DB::table('properties as p')
            ->join('cities as c', 'c.id', 'p.city_id')
            ->join('city_address as ca', 'ca.id', 'p.address_id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->select('p.*', 'c.name as city', 'ca.name as city_address', 'u.company', 'u.name as user_name', 'u.number', 'u.email', 'u.id as userID', 'c.id as cityID')
            ->where('p.id', $id)
            ->first();

        $property_sql = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as ca', 'ca.id', 'p.address_id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->select('p.id', 'p.name', 'u.image', 'u.company', 'u.city as user_city', 'p.description', 'p.youtube_link', 'p.phone_num', 'p.slug', 'p.image', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType', 'ca.name as city_address')->where('p.is_admin', 1);

        $featured_property = $property_sql->where('p.featured', 1)->inRandomOrder()->offset(0)->limit(3)->get();
        $property_boost = $property_sql->where('p.boost', 1)->inRandomOrder()->offset(0)->limit(3)->get();
        $property_similar = $property_sql->where('p.purpose_id', $property->purpose_id)->inRandomOrder()->offset(0)->limit(2)->get();
        $user_property = $property_sql->where('p.user_id', $property->user_id)->inRandomOrder()->offset(0)->limit(4)->get();
        $gallery = DB::table('galleries')->where('property_id', $id)->get();

        $seo = DB::table('property_seo')->where('property_id', $id)->first();

        $data['property_details'] = $property;
        $data['property_similar'] = $property_similar;
        $data['property_boost'] = $property_boost;
        $data['featured_property'] = $featured_property;
        $data['user_property'] = $user_property;
        $data['gallery'] = $gallery;
        $data['seo'] = $seo;
        $data['seo_title'] = $property->size . ' ' . $property->area . ' ' . $property->name . $property->city_address . ', ' . $property->city . ' ID' . $property->id;
        $data['seo_description'] = $property->name . ' in ' . $property->city_address . ', ' . $property->city . ' at ' . $property->price . ' Find houses, plots, flats, offices, and land for sale or rent in Pakistan. - shinnyview.com';
        return view('frontend.property_detail', $data);
    }

    // view property
    public function viewPropertybyAdmin($id)
    {
        $property = DB::table('properties as p')
            ->join('cities as c', 'c.id', 'p.city_id')
            ->join('city_address as ca', 'ca.id', 'p.address_id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->select('p.*', 'c.name as city', 'ca.name as city_address', 'u.company', 'u.name as user_name', 'u.number', 'u.email', 'u.id as userID', 'c.id as cityID')
            ->where('p.id', $id)
            ->first();

        $property_sql = DB::table('properties as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->join('city_address as ca', 'ca.id', 'p.address_id')
            ->join('users as u', 'u.id', 'p.user_id')
            ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
            ->join('property_type as pt', 'p.property_type_id', 'pt.id')
            ->select('p.id', 'p.name', 'u.image', 'u.company', 'u.city as user_city', 'p.description', 'p.youtube_link', 'p.phone_num', 'p.slug', 'p.image', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType', 'ca.name as city_address')->where('p.is_admin', 1);

        $featured_property = $property_sql->where('p.featured', 1)->inRandomOrder()->offset(0)->limit(3)->get();
        $property_boost = $property_sql->where('p.boost', 1)->inRandomOrder()->offset(0)->limit(3)->get();
        $property_similar = $property_sql->where('p.purpose_id', $property->purpose_id)->inRandomOrder()->offset(0)->limit(2)->get();
        $user_property = $property_sql->where('p.user_id', $property->user_id)->inRandomOrder()->offset(0)->limit(4)->get();
        $gallery = DB::table('galleries')->where('property_id', $id)->get();

        $seo = DB::table('property_seo')->where('property_id', $id)->first();

        $data['property_details'] = $property;
        $data['property_similar'] = $property_similar;
        $data['property_boost'] = $property_boost;
        $data['featured_property'] = $featured_property;
        $data['user_property'] = $user_property;
        $data['gallery'] = $gallery;
        $data['seo'] = $seo;
        $data['seo_title'] = $property->size . ' ' . $property->area . ' ' . $property->name . $property->city_address . ', ' . $property->city . ' ID' . $property->id;
        $data['seo_description'] = $property->name . ' in ' . $property->city_address . ', ' . $property->city . ' at ' . $property->price . ' Find houses, plots, flats, offices, and land for sale or rent in Pakistan. - shinnyview.com';
        return view('frontend.property_detail', $data);
    }

    public function login()
    {
        return view('frontend.login');
    }
    public function register()
    {
        return view('frontend.register');
    }
    public function aboutUs()
    {
        return view('frontend.about_us');
    }
    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }
    public function refundPolicy()
    {
        return view('frontend.refund_policy');
    }

    public function faq()
    {
        return view('frontend.faq');
    }
    public function application_house()
    {
        $data['application'] = "application-house";
        return view('frontend.application_form', $data);
    }
    public function application_investment()
    {
        $data['application'] = "application-investment";
        return view('frontend.application_form', $data);
    }
    public function termsConditions()
    {
        return view('frontend.terms_conditions');
    }
    public function getCities(Request $request)
    {
        $data = City::where('name', 'like', '%' . $request->term . '%')->get();
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }
    public function contact_us()
    {
        return view('frontend.contact_us');
    }
    public function complaint_policy()
    {
        return view('frontend.complaint_policy');
    }
}
