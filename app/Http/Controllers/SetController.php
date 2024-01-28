<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SetController extends Controller
{
    public function index()
    {

    }

    public function addreview(Request $request)
    {
        $imageX = null;
        $inf = $this->validate($request,[
            'listing_id'=>'integer',
            'quality'=>'numeric',
            'location'=>'numeric',
            'space'=>'numeric',
            'service'=>'numeric',
            'price'=>'numeric',
            'name'=>'string',
            'email'=>'string',
            'subject'=>'string',
            'comment'=>'string',
            'img'=>'file',
            'created_at'=> Carbon::now(),
        ]);
        if ($request->hasFile('img')) {
            $original_filename = $request->file('img')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/user/';
            $image = $original_filename . time() . '.' . $file_ext;

            if ($request->file('img')->move($destination_path, $image)) {
                $imageX=$image;
            }
        }
        $inf['img'] = $imageX;

        $data = DB::table('listing_comments')
            ->insertGetId($inf);
        if ($data)
        return redirect('/listing/'.$request->listing_id);
        else
            return redirect()->back('403');
    }
    
    
     public function disput(Request $request)
    {
        
        $inf = [
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'disput'=>$request->disput,
            'status'=>'NEW',
            'listing_id'=>$request->listing_id,
            'created_at'=> Carbon::now(),
        ];
    
        $data = DB::table('disputs')->insertGetId($inf);
        if ($data)
            return redirect('/listing/'.$request->listing_id);
        else
            return redirect()->back('403');
    }
}
