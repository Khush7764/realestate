<?php

namespace App\Observers;

use App\Mail\UserRegistered;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        \Mail::to($user->email)->send(new UserRegistered($user));
    }
}
