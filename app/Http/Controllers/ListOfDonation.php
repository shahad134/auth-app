<?php

namespace App\Http\Controllers;
use App\Models\donations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ListOfDonation extends Controller
{
    //
    public function index(){
        //
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('benefits.donations.create');

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      
    $donations =new donations();
    $donations->user_id=Auth::user()->id;
    $donations->furniture=$request->{'furniture'};
    $donations->clothes=$request->{'clothes'};
    $donations->save();
    if (auth()->user()->donations())
        return response()->json([
        'success' => true,
        'data' => $donations->toArray()
    ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'Data could not be added'
        ], 500);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}