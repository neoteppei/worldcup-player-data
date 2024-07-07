<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;



    public function allPlayer()
    {
        $players = Player::select([
                'p.id',
                'p.country_id',
                'p.uniform_num',
                'p.position',
                'p.name',
                'p.club',
                'p.birth',
                'p.height',
                'p.weight',
                'c.id as country_id',
                'c.name as country_name',
                'c.ranking',
                'c.group_name',
            ])
            ->from('players as p')
            ->join('countries as c', 'p.country_id', '=', 'c.id')
            ->paginate(20);
            return $players;
    }
}
