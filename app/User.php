<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;

    protected $table = 'login';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'userid', 'user_pass', 'sex', 'email', 'birthdate',
    ];

    protected $hidden = [
        'user_pass', 'state', 'unban_time', 'expiration_time', 'logincount',
        'character_slots', 'pincode', 'pincode_change', 'vip_time', 'old_group',
        'antibotphp',
    ];

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if(!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    public function isGM(){
        if(($this->group_id)==99){
            return true;
        }else{
            return false;
        }
    }
}
