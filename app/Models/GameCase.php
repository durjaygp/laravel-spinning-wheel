<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Skin;

class GameCase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function skin()
    {
        return $this->belongsTo(Skin::class,'skin_id');
    }

}
