<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    public $timestamps = false;

    protected $table = 'guild';
    protected $primaryKey = 'guild_id';

    protected $hidden = [
        'char_id', 'guild_lv', 'connect_member',
        'max_member', 'average_lv',
        'exp', 'next_exp', 'skill_point',
        'mes1', 'mes2', 'emblem_len', 'emblem_id', 'last_master_change',
        'guildpoints',
    ];
}
