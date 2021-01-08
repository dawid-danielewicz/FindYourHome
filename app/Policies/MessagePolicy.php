<?php

namespace App\Policies;

use App\{User, Message};
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkOwner(User $user, Message $message){
        if($message->user_id == $user->id)
            return $user->id === $message->user_id;
    }
}
