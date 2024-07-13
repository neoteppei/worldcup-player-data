<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Country;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::allPlayers();
        return view('players.index', ['players' => $players]);
    }

    public function detail($id)
    {
        $player = Player::with(['goals.pairing.enemyCountry', 'country'])->where('del_flg', 0)->find($id);

        if (!$player) {
            return redirect()->route('player.index')->with('error', '選手が見つかりません。');
        }

        $totalGoals = $player->goals->count();

        $goalDetails = $player->goals->map(function ($goal) {
            return [
                'goal_time' => $goal->goal_time,
                'kickoff' => $goal->pairing->kickoff,
                'enemy_country_name' => $goal->pairing->enemyCountry->name,
            ];
        });

        return view('players.detail', [
            'player' => $player,
            'totalGoals' => $totalGoals,
            'goalDetails' => $goalDetails,
        ]);
    }

    public function delete($id)
    {
        $player = Player::find($id);

        if (!$player) {
            return redirect()->route('player.index')->with('error', '選手が見つかりません。');
        }

        // 論理削除
        $player->del_flg = 1;
        $player->save();

        return redirect()->route('player.index')->with('success', '選手が削除されました。');
    }

    public function edit($id)
    {
        $player = Player::where('del_flg', 0)->findOrFail($id);
        $countries = Country::all();
        $positions = ['GK', 'DF', 'MF', 'FW'];

        return view('players.edit', compact('player', 'countries', 'positions'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'uniform_num' => 'required|integer|numeric',
        'position' => 'required|string',
        'name' => 'required|string',
        'country_id' => 'required|integer|exists:countries,id',
        'club' => 'required|string',
        'birth' => 'required|date_format:Y-m-d',
        'height' => 'required|integer|numeric',
        'weight' => 'required|integer|numeric',
    ], [
        'required' => 'この項目は必須入力です',
        'integer' => 'この項目は半角数字で入力してください',
        'numeric' => 'この項目は半角数字で入力してください',
        'date_format' => 'この項目は「YYYY-MM-DD」で入力してください',
    ]);

    $player = Player::where('del_flg', 0)->findOrFail($id);


    $player->uniform_num = $validatedData['uniform_num'];
    $player->position = $validatedData['position'];
    $player->name = $validatedData['name'];
    $player->country_id = $validatedData['country_id'];
    $player->club = $validatedData['club'];
    $player->birth = $validatedData['birth'];
    $player->height = $validatedData['height'];
    $player->weight = $validatedData['weight'];

    $player->save(); 

    return redirect()->route('player.edit', $id)->with('success', '選手情報が更新されました。');
}
}