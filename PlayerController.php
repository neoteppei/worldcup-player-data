<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class PlayerController extends Controller
{
        // 選手一覧データを取得
        public function showPlayer()
        {
            $playerTable = new Player;
            $play = $playerTable->allPlayer();
            return $play;
        }
    
    // 選手一覧画面を表示
        public function index()
        {
            $players = $this->showPlayer();
            return view('players.index', ['players' => $players]);
        }
    
        // 選手詳細を表示
        public function detail($id)
        {
            
            $player = Player::find($id);
            return view('players.detail', ['player' => $player]);
        }
    }

