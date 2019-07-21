<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelPost extends Model
{
    protected $table = 'channel_post';
    protected $primaryKey = 'channel_post_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posted_at'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }
}
