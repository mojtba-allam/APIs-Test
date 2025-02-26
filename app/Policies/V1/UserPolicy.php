<?php

namespace App\Policies\V1;

use App\Http\Filters\V1\TicketFilter;
use App\Models\User;
use App\Permissions\V1\Abilities;
use App\Models\Ticket;

class   UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, User  $model){
        return $user->tokenCan(Abilities::DeleteUser);
    }


    public function replace(User $user, User  $model){
        return $user->tokenCan(Abilities::ReplaceUser);
    }

    public function store(User $user){
        return $user->tokensCan(Abilities::CreateUser);
    }

    public function update(User $user, User  $model){
        return $user->tokenCan(Abilities::UpdateUser);
    }
}
