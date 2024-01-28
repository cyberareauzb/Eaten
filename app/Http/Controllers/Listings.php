<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Listings extends Controller
{
    public function index(){

    }
    public function addListing(){
        $listTypes = DB::table('listing_types')->get();
    }

    public function checkout(Request $request){
        // dd($request->all());

//  "_token" => "W1seft7WTg4VJjE1TmV5GpznV7BapCqffQdjk3rV"
//   "lid" => "16" listing_id
//   "datetime" => "2023-12-27T19:50"
//   "guest_count" => "10"
//   "items" => """"
//   "firstname" => "Bobur"
//   "lastname" => "Xamidov"
//   "email" => "vodimaxjon@gmail.com"
//   "phone" => "+998915227665"
//   "language" => "Uzbek"
//   "desire" => "sdgsdfgsdfg dfgsd fgdfg dfsg sdf"
//   "paymethod" => "cach"
// "summ" => "40"
//   "tax" => "4.8"

        $request['service_pay'] = 0;
        $items = json_decode($request['items']);
        $list = DB::table('listings')->where('id', '=', $request->listing_id)->first();
        // dd($items);
        $addStatus = 0;
        $request['vendor_id'] = $list->users_id;

        $addOrder = DB::table('orders')->insertGetId($request->only('user_id', 'firstname', 'lastname', 'phone', 'email', 'datetime', 'guestcount', 'paymethod', 'paystatus', 'listing_id', 'language', 'desire', 'summ', 'tax', 'service_pay', 'vendor_id'));

        if($addOrder > 0){
            foreach ($items as $item){
                $addedItem = DB::table('order_items')->insertGetId([
                    'food_id' => $item->foodid,
                    'count' => $item->count,
                    'order_id' => $addOrder
                    ]);
                    if($addedItem > 0){
                        $addStatus = 1;
                    }else{
                        $addStatus = 0;
                    break;
                    }
            }

        }
        if($addStatus == 1){
            Mail::to($request['email'])->send(new \App\Mail\OrderShipped($addOrder));
        return ['status' => 200, 'message' => 'Succesfuly'];
        }else{
            return ['status' => 200, 'message' => 'Error Added Order'];
        }
    }
}
