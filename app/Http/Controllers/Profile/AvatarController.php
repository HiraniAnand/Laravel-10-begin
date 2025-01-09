<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->store('avatars', 'public');

        if($oldavatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldavatar);
        }

        auth()->user()->update(['avatar' => $path]);
        // dd(auth()->user());

        return redirect( route('profile.edit') )->with('message', 'avatar-updated');
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