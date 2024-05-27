<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        $followUser = Auth::user();

        $followUser->following()->syncWithoutDetaching($user);
        //$followUserのidをfollow_user_id、$userのidをfollower_user_idとしてfollowsテーブルに完全重複以外は保存
        return response()->json($user);
        //引数をjsonに変換&(data.name)のように取り出せるようにする(JSON.stringifyとJSON.parseを一つにした感じ)
    }
    
    public function destroy(User $user)
    {
        $followUser = Auth::user();

        $followUser->following()->detach($user);

        return response()->json($user);
    }
}
