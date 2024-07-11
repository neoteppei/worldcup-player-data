<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeActive($query)
    {
        return $query->where('del_flg', 0);
    }

    public static function allPlayers()
    {
        return self::select([
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
            ->where('p.del_flg', 0)
            ->paginate(20);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeActive($query)
    {
        return $query->where('del_flg', 0);
    }

    public static function allPlayers()
    {
        return self::select([
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
            ->where('p.del_flg', 0)
            ->paginate(20);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2
