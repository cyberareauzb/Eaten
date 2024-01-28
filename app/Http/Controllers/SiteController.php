<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SiteController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        $listingTypes = DB::table('listing_types')->get();
        $cats = DB::table('categories')->get();
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        $listings = DB::table('listings')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
            ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
            ->get(15);

        $list = [];

        foreach ($listings as $listing) {
            $listing->foods = DB::table('listing_food')
                ->where('listing_food.listing_id', '=', $listing->id)
                ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
                ->select('listing_food.id', 'food_types.price', 'food_types.name'.$lang.' as name')
                ->get();

            array_push($list, $listing);
        }

        $regLists = [];
        $regions = DB::table('regions')->get();
        foreach ($regions as $region) {
            $region->listcount = DB::table('listings')->where('region_id', '=', $region->id)->count();
            if ($region->listcount > 0) {
                array_push($regLists, $region);
            }
        }

        $comments = DB::table('listing_comments')->get();

        return view('welcome', ["listingTypes" => $listingTypes, "cats" => $cats, 'listings' => $list,'regions'=>$regions, 'reglists' => $regLists,'lang' => $lang, 'comments' => $comments]);
    }

    public function news(Request $request, $id)
    {
         $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        $news = DB::table('newses')->where('id', '=', $id)->first();

        return view('news', ['news' => $news, 'l' => $lang]);
    }
    public function blog()
    {
         $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        $newses = DB::table('newses')->get();

        return view('blog', ['newses' => $newses, 'l' => $lang]);
    }

    public function foods()
    {
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }

        $foods = DB::table('food_types')->get();

        return view('foods', ['foods' => $foods, 'lang' => $lang]);
    }

    public function food($id)
    {
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }

        $food = DB::table('food_types')->where('id', '=', $id)->first();

        return view('food', ['food' => $food, 'lang' => $lang]);
    }

    public function listings(Request $request)
    {
        $regions = DB::table('regions')->get();
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }

        if (isset($request['lat'])){
            $lat = intval($request['lat']);
            $lng = intval($request['lng']);
            $listings = DB::table('listings')
                ->join('regions', 'regions.id', '=', 'listings.region_id')
                ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
                ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
                ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
                ->orderByRaw('SQRT(POWER(`location`->>\'$.lat\' - '.$lat.' ,2) + POWER(`location`->>\'$.lng\'- '.$lng.' ,2)) ')
                ->get();
        }else
            $listings = DB::table('listings')
                ->join('regions', 'regions.id', '=', 'listings.region_id')
                ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
                ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
                ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
                ->get();

        $list = [];
        $locations = [];
        foreach ($listings as $listing) {
            $listing->foods = DB::table('listing_food')
                ->where('listing_food.listing_id', '=', $listing->id)
                ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
                ->select('listing_food.id', 'food_types.price', 'food_types.name'.$lang.' as name')
                ->get();
            $xname = '';
            if ($lang === 'uz')
                $xname = $listing->nameuz;
            elseif ($lang === 'ru')
                $xname = $listing->nameru;
            else
                $xname = $listing->nameen;
            $location = [
                "id"=>$listing->id,
                "title" => $xname,
                "lang" => json_decode($listing->location)->lng,
                "lat" => json_decode($listing->location)->lat,
                "img" => $listing->img,
            ];
            array_push($list, $listing);
            array_push($locations, $location);
        }
        $listingTypes = DB::table('listing_types')->get();
        $cats = DB::table('categories')->get();

        return view('listings', ['regions' => $regions, 'listings' => $list, "listingTypes" => $listingTypes, "cats" => $cats, "locations" => $locations,'lang'=>$lang]);
    }

    public function search(Request $request)
    {
        $regions = DB::table('regions')->get();
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        // $listings = DB::table('listings')
        //     ->join('regions', 'regions.id', '=', 'listings.region_id')
        //     ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
        //     ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
        //     ->join('listing_food', 'listing_food.listing_id', '=', 'listings.id')
        //     ->join('food_types','listing_food.food_type_id','=','food_types.id')
        //     ->where(function (Builder $query) {
        //         global  $request;
        //         $query->where('food_types.nameuz','like','%'.$request['nomi'].'%')
        //             ->orWhere('food_types.nameru','like','%'.$request['nomi'].'%')
        //             ->orWhere('food_types.nameen','like','%'.$request['nomi'].'%');
        //     })
        //     ->where('listings.client_count','>',intval($request['soni']))
        //     ->where('listings.category_id','=',$request['category'])
        //     ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
        //     ->distinct('listings')
        //     ->get();
        $data = Carbon::make($request['data']);
        $listings = DB::table('listings')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')

            ->where('listings.client_count','>',intval($request['count']))
            ->where('listings.region_id','=',$request['region'])
            ->where('listings.start_date','<',$request['data'])
            ->where('listings.end_date','>',$request['data'])
            ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
            ->distinct('listings')
            ->get();
        $list = [];
        $locations = [];
        foreach ($listings as $listing) {
            $listing->foods = DB::table('listing_food')
                ->where('listing_food.listing_id', '=', $listing->id)
                ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
                ->select('listing_food.id', 'food_types.price', 'food_types.name'.$lang.' as name')
                ->get();
            $xname = '';
            if ($lang === 'uz')
                $xname = $listing->nameuz;
            elseif ($lang === 'ru')
                $xname = $listing->nameru;
            else
                $xname = $listing->nameen;
            $location = [
                "id"=>$listing->id,
                "title" => $xname,
                "lang" => json_decode($listing->location)->lng,
                "lat" => json_decode($listing->location)->lat,
                "img" => $listing->img,
            ];
            array_push($list, $listing);
            array_push($locations, $location);
        }
        $listingTypes = DB::table('listing_types')->get();
        $cats = DB::table('categories')->get();

        return view('listings', ['regions' => $regions, 'listings' => $list, "listingTypes" => $listingTypes, "cats" => $cats, "locations" => $locations,'lang'=>$lang]);
    }

    public function searchCat(Request $request,$id)
    {
        $regions = DB::table('regions')->get();
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        // $listings = DB::table('listings')
        //     ->join('regions', 'regions.id', '=', 'listings.region_id')
        //     ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
        //     ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
        //     ->join('listing_food', 'listing_food.listing_id', '=', 'listings.id')
        //     ->join('food_types','listing_food.food_type_id','=','food_types.id')
        //     ->where(function (Builder $query) {
        //         global  $request;
        //         $query->where('food_types.nameuz','like','%'.$request['nomi'].'%')
        //             ->orWhere('food_types.nameru','like','%'.$request['nomi'].'%')
        //             ->orWhere('food_types.nameen','like','%'.$request['nomi'].'%');
        //     })
        //     ->where('listings.client_count','>',intval($request['soni']))
        //     ->where('listings.category_id','=',$request['category'])
        //     ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
        //     ->distinct('listings')
        //     ->get();
        $listings = DB::table('listings')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')

            ->where('listings.category_id','=',$id)
            ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
            ->distinct('listings')
            ->get();
        $list = [];
        $locations = [];
        foreach ($listings as $listing) {
            $listing->foods = DB::table('listing_food')
                ->where('listing_food.listing_id', '=', $listing->id)
                ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
                ->select('listing_food.id', 'food_types.price', 'food_types.name'.$lang.' as name')
                ->get();
            $xname = '';
            if ($lang === 'uz')
                $xname = $listing->nameuz;
            elseif ($lang === 'ru')
                $xname = $listing->nameru;
            else
                $xname = $listing->nameen;
            $location = [
                "id"=>$listing->id,
                "title" => $xname,
                "lang" => json_decode($listing->location)->lng,
                "lat" => json_decode($listing->location)->lat,
                "img" => $listing->img,
            ];
            array_push($list, $listing);
            array_push($locations, $location);
        }
        $listingTypes = DB::table('listing_types')->get();
        $cats = DB::table('categories')->get();

        return view('listings', ['regions' => $regions, 'listings' => $list, "listingTypes" => $listingTypes, "cats" => $cats, "locations" => $locations,'lang'=>$lang]);
    }
    public function searchListing(Request $request)
    {
        $regions = DB::table('regions')->get();
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        $listings = DB::table('listings')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
            ->join('listing_food', 'listing_food.listing_id', '=', 'listings.id')
            ->join('food_types','listing_food.food_type_id','=','food_types.id')
            ->where(function (Builder $query) {
                global  $request;
                $query->where('food_types.nameuz','like','%'.$request['nomi'].'%')
                    ->orWhere('food_types.nameru','like','%'.$request['nomi'].'%')
                    ->orWhere('food_types.nameen','like','%'.$request['nomi'].'%');
            })
            ->orWhere('listings.category_id','=',$request['category'])
            ->orWhere('listings.listing_type_id','=',$request['listType'])
            ->orWhere('listings.region_id','=',$request['region'])
            ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
            ->distinct('listings')
            ->get();
        $list = [];
        $locations = [];
        foreach ($listings as $listing) {
            $listing->foods = DB::table('listing_food')
                ->where('listing_food.listing_id', '=', $listing->id)
                ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
                ->select('listing_food.id', 'listing_food.price', 'food_types.name'.$lang.' as name')
                ->get();
            $xname = '';
            if ($lang === 'uz')
                $xname = $listing->nameuz;
            elseif ($lang === 'ru')
                $xname = $listing->nameru;
            else
                $xname = $listing->nameen;
            $location = [
                "id"=>$listing->id,
                "title" => $xname,
                "lang" => json_decode($listing->location)->lng,
                "lat" => json_decode($listing->location)->lat,
                "img" => $listing->img,
            ];
            array_push($list, $listing);
            array_push($locations, $location);
        }
        $listingTypes = DB::table('listing_types')->get();
        $cats = DB::table('categories')->get();

        return view('listings', ['regions' => $regions, 'listings' => $list, "listingTypes" => $listingTypes, "cats" => $cats, "locations" => $locations,'lang'=>$lang]);
    }

    public function listing(Request $request, $id)
    {
        $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        $list = DB::table('listings')->where('listings.id', '=', $id)
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->select('listings.*', 'tumen.name'.$lang.' AS tumanName', 'regions.name'.$lang.' AS regionName', 'listing_statuses.name'.$lang.' AS StatusName')
            ->first();

        $list->galer = json_decode($list->gallery);
        $list->lat = json_decode($list->location)->lat;
        $list->long = json_decode($list->location)->lng;

        $menu = DB::table('listing_food')
            ->where('listing_food.listing_id', '=', $list->id)
            ->join('food_types', 'food_types.id', '=', 'listing_food.food_type_id')
            ->select('listing_food.id','food_types.id as foodid', 'food_types.price', 'food_types.name'.$lang.' as name', 'food_types.img as foodimg', 'food_types.description'.$lang.' as description')
            ->get();
        $comments = DB::table('listing_comments')
            ->where('listing_comments.listing_id','=',intval($id))->get();
        $comInfo = DB::table('listing_comments')
            ->select(
                DB::raw('SUM( quality ) as total_quality'),
                DB::raw('SUM( location ) as total_location'),
                DB::raw('SUM( space ) as total_space'),
                DB::raw('SUM( service ) as total_service'),
                DB::raw('SUM( price ) as total_price')
            )
            ->where('listing_comments.listing_id','=',intval($id))->first();
        $comInfo->count = $comments->count();

        $comInfo = ($comInfo->count != 0)
            ? $comInfo
            : (object)[ "total_quality" => 0, "total_location" => 0, "total_space" => 0, "total_service" => 0,"total_price" => 0, "count" => 0 ];
        // return $comInfo;

        $udob = DB::table('listing_conveniences')->select('conveniences.nameuz', 'conveniences.nameru', 'conveniences.nameen')
            ->where('listing_conveniences.listing_id','=',intval($id))
            ->join('conveniences', 'conveniences.id', '=', 'listing_conveniences.convenience_id')->get();

        $userInfo = DB::table('listings')
            ->join('users', 'users.id','listings.users_id')
            ->join('regions', 'regions.id','users.region_id')
            ->join('tumen', 'tumen.id','users.tuman_id')
            ->select('users.*',DB::raw('CONCAT(regions.name'.$lang.',", ",tumen.name'.$lang.') as address2'))->first();
        return view('singlelisting', ['list' => $list, "menu" => $menu,'lang'=>$lang,'id' => $id,'comInfo' => $comInfo,'comments'=>$comments,'userInfo'=>$userInfo, 'udob' => $udob]);
    }

    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
            $lang = 'en';
        if (session('siteLang')) {
            $lang = session('siteLang');
        }
        return view('contact', ['lang' => $lang]);
    }
    public function booking(Request $request)
    {
        $list = DB::table('listings')->where('id', '=', $request->listingid)->first();


        return view('booking', ['listing' => $list, 'items'=> $request->orderitems, 'datetime' => $request->datetime, 'guest_count' => $request->guest_count ]);
    }
}
