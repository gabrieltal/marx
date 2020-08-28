<?php

namespace App;

trait Comraderie {
    public function comraderies()
    {
        return $this->morphToMany(User::class, 'comraderie')->withTimestamps();
    }

    public function hasGivenComraderie($user)
    {
        if ($user === null) {
            return false;
        } else {
            return $this->comraderies()->where('id', $user->id)->exists();
        }
    }
}
