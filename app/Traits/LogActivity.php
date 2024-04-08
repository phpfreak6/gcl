<?php

namespace App\Traits;

/**
 * @mixin \Eloquent
 */
trait LogActivity
{
    public function get_activity_user()
    {
        if($this->activity){
            $user = \App\User::find($this->activity->causer_id);
            if($user)
                return $user->name;
        }

        return "";
    }
}
