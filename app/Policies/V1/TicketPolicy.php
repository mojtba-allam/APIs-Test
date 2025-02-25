<?php

namespace App\Policies\V1;

use App\Http\Filters\V1\TicketFilter;
use App\Models\User;
use App\Permissions\V1\Abilities;

class TicketPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Ticket  $ticket){
        if ($user->tokensCan(Abilities::DeleteTicket)) {
            return true;
        }elseif ($user->tokenCan(Abilities::DeleteOwnTicket)) {
            return $user->id === $ticket->user_id;
        }
        return false;
    }


    public function replace(User $user, Ticket  $ticket){
        if ($user->tokensCan(Abilities::ReplaceTicket)) {
            return true;
        }
        return false;
    }

    public function store(User $user){
        return $user->tokensCan(Abilities::CreateTicket) ||
                $user->tokenCan(Abilities::CreateOwnTicket);
    }

    public function update(User $user, Ticket  $ticket){
        if ($user->tokensCan(Abilities::UpdateTicket)) {
            return true;
        }elseif ($user->tokenCan(Abilities::UpdateOwnTicket)) {
            return $user->id === $ticket->user_id;
        }
        return false;
    }
}
