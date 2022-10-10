<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;

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
        'posted_at', 'content', 'channel_id'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }
}
