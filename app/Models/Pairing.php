<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    use HasFactory;

    protected $fillable = ['kickoff', 'my_country_id', 'enemy_country_id'];

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function enemyCountry()
    {
        return $this->belongsTo(Country::class, 'enemy_country_id');
    }
}
