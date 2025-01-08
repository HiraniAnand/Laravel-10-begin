<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path("app")."/$path"]);
        dd(auth()->user());

        return redirect( route('profile.edit') );
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $user = auth()->user();

    //     $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    //     $request->avatar->storeAs('avatars', $avatarName);

    //     $user->avatar = $avatarName;
    //     $user->save();

    //     return back()
    //         ->with('success','You have successfully upload image.');
    // }
}
