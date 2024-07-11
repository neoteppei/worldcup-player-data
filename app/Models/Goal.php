<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['pairing_id', 'player_id', 'goal_time'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function pairing()
    {
        return $this->belongsTo(Pairing::class);
    }
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['pairing_id', 'player_id', 'goal_time'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function pairing()
    {
        return $this->belongsTo(Pairing::class);
    }
}
>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2
