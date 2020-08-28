<?php

namespace App;

trait Comraderie {
    public function giveComraderie()
    {
        $this->comraderies()->attach(auth()->user());
        $this->refresh();
        return true;
    }

    public function revokeComraderie()
    {
        $this->comraderies()->detach(auth()->user());
        $this->refresh();
        return true;
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
