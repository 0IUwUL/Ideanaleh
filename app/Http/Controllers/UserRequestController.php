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

    public function update(UserRequest $help, Request $request): Object
    {
        $help->is_resolved = $request->status;
        $help->save();

        return redirect()->back();
    }

    public function destroy(UserRequest $help): Object
    {
        $help->delete();

        return redirect()->back();
    }

   
}
