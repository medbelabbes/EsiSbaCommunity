<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invitation;
use App\Invitationmail;
use Auth;




class InvitationmailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }




    public function send(Request $request)
    {

        $this->validate($request,['email' => 'required|email|max:255|regex:/(.*)@esi-sba.dz/i|unique:invitationmails',]);


        $user = Auth::User();
        $email = $request->input('email');
        $invit = new Invitationmail;
        $invit->email = $email;
        $invit->user_id = $user->id;
        $invit->save();

        // envoyer email...
        Mail::to($email)->send(new Invitation());

        return Redirect::back()->with('message', 'Modifié avec succes');
    }

}
