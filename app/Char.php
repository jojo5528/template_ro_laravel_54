<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    public $timestamps = false;

    protected $table = 'char';
    protected $primaryKey = 'char_id';

    protected $hidden = [
        'char_num', 'class', 'base_level', 'job_level', 'base_exp', 'job_exp', 'zeny',
        'str', 'agi', 'vit', 'int', 'dex', 'luk', 'max_hp', 'hp', 'max_sp', 'sp', 'status_point', 'skill_point',
        'option', 'karma', 'manner', 'party_id', 'pet_id', 'homun_id', 'elemental_id', 'hair', 'hair_color', 'clothes_color',
        'body', 'weapon', 'shield', 'head_top', 'head_mid', 'head_bottom', 'robe',
        'last_map', 'last_x', 'last_y', 'save_map', 'save_x', 'save_y',
        'partner_id', 'father', 'mother', 'child', 'fame', 'rename', 'delete_date', 'moves', 'unban_time', 'font',
        'uniqueitem_counter', 'sex', 'hotkey_rowshift', 'clan_id', 'last_login', 'title_id', 'show_equip',
    ];
}
