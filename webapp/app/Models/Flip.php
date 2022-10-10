<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FlipItem;

class Flip extends Model
{
    //
    protected $table = 'flip';
    public function items()
    {
        return $this->hasMany(FlipItem::class);
    }
}
