<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Mail\YouHaveAMatch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InterestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(User $user)
    {
        $authUser = auth()->user();


        $authUser->interests()->create([
            'interest_to' => $user->id,
            'interest_type' => 'like'
        ]);

        if ($user->matchWith($authUser)) {
            Mail::to($authUser->email)
                ->queue(new YouHaveAMatch($authUser, $user));

            Mail::to($user->email)
                ->queue(new YouHaveAMatch($user, $authUser));

        }



        return redirect()->back();
    }

    public function dislike(User $user)
    {
        $authUser = auth()->user();

        $authUser->interests()->create([
            'interest_to' => $user->id,
            'interest_type' => 'dislike'
        ]);


        return redirect()->back();
    }


}
