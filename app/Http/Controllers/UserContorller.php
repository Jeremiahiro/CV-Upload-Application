<?php

namespace App\Http\Controllers;

use App\Extensions\Utils\UploadManager;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserContorller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_profile_complete')->except(['index', 'update']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        $user = Auth::user();
        return view('v1.user.index', compact(['user']));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(Request $request)
    {
        $request->validate([
            'first_name'    => ['required', 'string'],
            'last_name'     => ['required', 'string'],
            'photo_url'     => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        $user = auth()->user();
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('name'),
        ]);
      
        return back()->with('success', 'Profile Updated Successfully');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password'          => ['required', new MatchOldPassword],
            'new_password'              => ['required', 'confirmed'],
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->input('new_password'))
        ]);

        return back()->with('success', 'Password change successfully');
    }

    public function update_image(Request $request)
    {
        $request->validate([
            'avatar_url' => ['required', 'image', 'max:5120'],
        ]);

        $uploadManager = new UploadManager();
        $path = $uploadManager->saveFile($request['avatar_url']);

        auth()->user()->update(['avatar_url' => $path]);

        return back()->with('success', 'Profile Image Successfully');
    }
}
