<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameCase;

class SpinWin extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(GameCase::class,'winning_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
