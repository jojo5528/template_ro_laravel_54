<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WOE_Data extends Model
{
    public $timestamps = false;
    
    protected $table = 'devkurov_woe_castles';

    protected $fillable = ['castle_id', 'name'];
}
