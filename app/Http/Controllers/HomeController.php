<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        
        // 管理ユーザーの場合、全ての選手を表示
        if ($user->role == 0) {
            $players = Player::where('del_flg', 0)->paginate(20);
        } 
        // 一般ユーザーの場合、ログインユーザーの所属国と同じ所属国の選手データを表示
        else {
            $players = Player::where('country_id', $user->country_id)->where('del_flg', 0)->paginate(20);
        }

        return view('players.index', compact('players'));
    }
}
