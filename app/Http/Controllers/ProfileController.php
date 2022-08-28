<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile()
    {   
        $userProfile = Profile::where('user_id', auth()->user()->id)->first();

        return view('backend.users.profile', compact('userProfile'));
    }

    public function profileUpdate(Request $request)
    {
       $user = Profile::where('user_id', auth()->user()->id)->first();
       
      // user Information update 

      DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(
            [
                'name' => $request->name ?? '',
            ] 
        );
       
       
       // profile create or update
        if($user == null){
            Profile::create([
                'user_id' => auth()->user()->id,
                'father_name' => $request->father_name,
            ]);
        }else{
            Profile::where('user_id', auth()->user()->id)->update([
                'father_name' => $request->father_name
            ]);
        }

        return redirect()->route('user.profile')->withSuccess('Profile Updated Done');


    }
}
