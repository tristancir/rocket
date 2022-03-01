<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flip extends Model
{
    //
    protected $table = 'flip';
    public function items()
    {
        return $this->hasMany(FlipItem::class);
    }
}
