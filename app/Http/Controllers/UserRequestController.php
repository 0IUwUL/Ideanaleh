<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserRequest;

class UserRequestController extends Controller
{
    public function index(): Object
    {
        return view('pages.contactUs');
    }


    public function store(Request $request): Object
    {
        UserRequest::create($request->all());
        
        $message = 'Your request has been submited';

        return redirect()->back()->with( ['toast' => 'inform', 'message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
}
