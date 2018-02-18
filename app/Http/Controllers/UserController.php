<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Image;
use App\User;
use App\Invitationmail;




class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function show(User $user)
    {
        return view('profile.information')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        return view('profile.parametres.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::User();
        $user->fill([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'sexe' => $request['sexe'],
            'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
            'lieu_n' => $request['lieu_n'],
            'apropos' => $request['apropos'],
        ])->save();
        return Redirect::back()->with('message', 'Modifier avec succes');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_img(Request $request){

        if($request->hasFile('InputImg')){
            $InputImg = $request->file('InputImg');
            $filename = time() . '.' . $InputImg->getClientOriginalExtension();
            Image::make($InputImg)->resize(300, 300)->save( public_path('/images/' . $filename ) );
            $user = Auth::User();
            $user->photo = $filename;
            $user->save();


        }
        return Redirect::back()->with('message', 'Modifié avec succes');
    }

}
