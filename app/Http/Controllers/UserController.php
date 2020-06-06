<?php

namespace App\Http\Controllers;


use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PictureRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('auth.user.profile', compact('user'));
    }

    public function edit(User $user)
    {
        return view('auth.user.edit', compact('user'));
    }

    public function update(User $user, UserRequest $request)
    {
        $min = $request->get('min_age');
        $max = $request->get('max_age');

        if ($user->minMaxAge($min, $max)) {
            $user->update([
                'gender' => $request->get('gender'),
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'location' => $request->get('location'),
                'min_age' => $min,
                'max_age' => $max,
                'looking_for' => $request->get('looking_for')
            ]);

            return redirect(route('user.profile', compact('user')))->with('status',"Profile updated successfully !");
        }
        return redirect()->back()->with('error',"'Age from' cannot be greater than 'Age to' !");
    }

    public function password(User $user)
    {
        return view('auth.user.password', compact('user'));
    }

    public function updatePassword(User $user, PasswordRequest $request)
    {
        $user->update([
            'password' => $request->get('password')
        ]);
        return redirect(route('user.profile', compact('user')))->with('password',"Password updated successfully !");;
    }

    public function updatePicture(User $user, PictureRequest $request)
    {

        if (isset($user->profile_picture)) {
            Storage::delete($user->profile_picture);
        }
        $picture = $request->file('profile_picture')->store('/pictures');
        $user->update([
            'profile_picture' => $picture
        ]);

        $user->dislikeDelete();

        return redirect()->back()->with('profile_pic',"Profile picture updated successfully !");;
    }

    public function dates()
    {
        $authUser = auth()->user();
        $user = $authUser->withoutAuthUser()->filterInterests()->lookingAge()->lookingGender()->inRandomOrder()->first();
        return view('auth.user.dates', compact('user'));
    }

    public function match()
    {

        $authUser = auth()->user();

        $users = User::match($authUser->id)->get();


        return view('auth.user.match', compact('users', 'authUser'));
    }

    public function targetProfile(User $user)
    {
        return view('auth.target.target', compact('user'));
    }


}
