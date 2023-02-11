<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\EmailService;

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

        $this->_notifyUser($request);

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

    private function _notifyUser(Request $request): void
    {
        $name = $request->name;
        $email = $request->email;
        $subject = "We received your request";
        $content = "Here is the summary of your report, <br>
        <br><b>Subject: ".$request->subject."</b>
        <br><br><b>Content: </b><br>    ".$request->content;
        
        (new EmailService)->inform($name, $email, $subject, $content);
    }
   
}
