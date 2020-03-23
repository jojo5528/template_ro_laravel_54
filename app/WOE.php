<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WOE extends Model
{
    public $timestamps = false;

    protected $table = 'guild_castle';
    protected $primaryKey = 'castle_id';
    
    protected $hidden = [
        'economy', 'defense', 'triggerE', 'triggerD', 'nextTime', 'payTime', 'createTime',
        'visibleC', 'visibleG0', 'visibleG1', 'visibleG2', 'visibleG3', 'visibleG4', 'visibleG5', 'visibleG6', 'visibleG7',
    ];

    public function Guild()
    {
        return $this->hasOne('App\Guild', 'guild_id', 'guild_id');
    }

    public function Castle()
    {
        return $this->hasOne('App\WOE_Data', 'castle_id', 'castle_id');
    }
}
