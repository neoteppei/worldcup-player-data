<<<<<<< HEAD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    // 選手一覧画面を表示
    public function index()
    {
        $players = $this->player->all(); // 全ての選手データを取得
        return view('players.index', ['players' => $players]);
    }

    // 選手詳細を表示
    public function detail($id)
    {
        $player = $this->player->find($id);
        return view('players.detail', ['player' => $player]);
    }
}
=======
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    // 選手一覧画面を表示
    public function index()
    {
        $players = $this->player->all(); // 全ての選手データを取得
        return view('players.index', ['players' => $players]);
    }

    // 選手詳細を表示
    public function detail($id)
    {
        $player = $this->player->find($id);
        return view('players.detail', ['player' => $player]);
    }
}
>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2
