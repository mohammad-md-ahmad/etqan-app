<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $currentUser = Auth::user();
        $username = $request->route()->parameter('username') ?? $currentUser;

        $user = User::query()->where('username', $username)->sole();
        $isFollowing = $user == $currentUser ? false : $user->isFollowedBy($currentUser);

        return view('user/profile', [
            'user' => $user,
            'isFollowing' => $isFollowing,
        ]);
    }

    public function toggleFollow(Request $request)
    {
        try {
            $username = $request->route()->parameter('username');

            $userToFollow = User::query()->where('username', $username)->sole();

            $follower = Auth::user();

            $alreadyFollowing = Follower::query()
                ->where('follower_id', $follower->id)
                ->where('following_type', User::class)
                ->where('following_id', $userToFollow->id)
                ->first();

            // current user is already following the target user
            if ($alreadyFollowing) {
                $alreadyFollowing->delete();
                $message = 'User has been unfollowed successfully';
            } else {
                $newFollow = new Follower();

                $newFollow->follower_id = $follower->id;
                $newFollow->following_type = User::class;
                $newFollow->following_id = $userToFollow->id;
                $newFollow->followed_at = now();

                $newFollow->save();

                $message = 'User has been followed successfully';
            }

            return response()->json(['message' => trans($message)], Response::HTTP_OK);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json(['message' => trans('Something wrong happened, please try again later!')], Response::HTTP_BAD_REQUEST);
        }
    }
}
