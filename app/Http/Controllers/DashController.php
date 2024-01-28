<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function dashboard()
    {
         $listing = DB::table('listings')
            ->join('regions', 'regions.id', '=', 'listings.region_id')
            ->join('tumen', 'tumen.id', '=', 'listings.tuman_id')
            ->join('listing_statuses', 'listing_statuses.id', '=', 'listings.listing_status_id')
            ->select('listings.*', 'tumen.nameuz AS tumanName', 'regions.nameuz AS regionName', 'listing_statuses.nameuz AS status')
            ->where('listings.users_id', '=', Auth::user()->id)
            ->get();

            $listcount = DB::table('listings')->where('listings.users_id', '=', Auth::user()->id)->count();
            $listapprovecount = DB::table('listings')->where('listing_status_id', '=', 2)->where('listings.users_id', '=', Auth::user()->id)->count();
        return view('dashboard', ['listings' => $listing, 'lcount' => $listcount, 'approve' => $listapprovecount]);
    }

    public function addlisting()
    {
        $listTypes = DB::table('listing_types')->get();
        $categories = DB::table('categories')->get();
        $regions = DB::table('regions')->get();
        $tumen = DB::table('tumen')->get();
        $conveniences = DB::table('conveniences')->get();
        $foods = DB::table('food_types')->get();
        return view('addlisting', ['listTypes' => $listTypes, 'categories' => $categories, 'regions' => $regions, 'tumans' => $tumen, 'conveniences' => $conveniences, 'foods' => $foods]);
    }

    public function listad(Request $request)
    {

// dd(Auth::id());

        $listing = DB::table('listings')->insertGetId([
            'nameuz' => $request['nameuz'],
            'img' => $request['img'],
            'addressuz' => $request['addressuz'],
            'location' => $request['location'],
            'phone' => $request['phone'],
            'descriptionuz' => $request['descriptionuz'],
            'gallery' => $request['gallery'],
            'client_count' => $request['client_count'],
            'tuman_id' => $request['tuman_id'],
            'region_id' => $request['region_id'],
            'listing_status_id' => 1,
            'listing_type_id' => $request['listing_type_id'],
            'category_id' => $request['category_id'],
            'priority_id' => 1,
            'start_date' => Carbon::now(),
            'end_date' => $request['end_date'],
            'expry_date' => $request['expry_date'],
            'users_id' => Auth::user()->id,
        ]);



        if($listing > 0){
            foreach ($request->conveniences as $convi){
                $conv = DB::table('listing_conveniences')->insertGetId([
                    'listing_id' => $listing,
                    'convenience_id' => $convi
                ]);
            }
            foreach ($request->foods as $food){
                $conv = DB::table('listing_food')->insertGetId([
                    'listing_id' => $listing,
                    'food_type_id' => $food
                ]);
            }
        }

        return ['list' => $listing, "status" => "Tabriklaymiz! Yangi E'lon joylandi..."];
    }

    public function listdelete(Request $request, $id){
        $listing = DB::table('listings')->delete($id);
        if($listing > 0){
            return $redirect('/dashboard');
        }
    }

    public function listings()
    {
        return view('listings');
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
        return view('contact');
    }
    public function bookings()
    {

        $bookings = DB::table('orders')->where('vendor_id', '=', Auth::user()->id)->get();


        return view('bookings', ['books'=>$bookings]);
    }
    public function myorders()
    {

        $bookings = DB::table('orders')->where('user_id', '=', Auth::user()->id)
            ->join('listings', 'listings.id', 'orders.listing_id')
            ->select('orders.*', 'listings.nameuz as listingname')->get();

        return view('myorders', ['books'=>$bookings]);
    }
    public function invioce(Request $request, $id)
    {

        $bookings = DB::table('orders')
            ->where('orders.id', '=', $id)
            ->join('listings', 'listings.id', 'orders.listing_id')
            ->select('orders.*', 'listings.nameuz as listingname')->first();

        $foods = DB::table('order_items')->where('order_items.order_id', '=', $id)
            ->join('food_types', 'food_types.id', 'order_items.food_id')
            ->select('order_items.*', 'food_types.nameen as foodname', 'food_types.price')->get();

//         Mail::to('vodimaxjon@gmail.com')->send(new \App\Mail\OrderShipped());

        return view('invioce', ['book'=>$bookings, 'foods' => $foods]);
    }
    public function messages()
    {
        return view('messages');
    }
    public function wallet()
    {
        return view('wallet');
    }
    public function comments()
    {
        return view('comments');
    }
}
