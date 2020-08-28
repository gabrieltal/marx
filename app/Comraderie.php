<?php

namespace App;

trait Comraderie {
    public function giveComraderie()
    {
        return $this->comraderies()->attach(auth()->user());
    }

    public function revokeComraderie()
    {
        return $this->comraderies()->detach(auth()->user());
    }

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
