<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function update(User $currUser, User $oriUser){
        return $currUser->id === $oriUser->id;
    }
    public function destroy(User $currUser, User $targetUser){
        return $currUser->id !== $targetUser->id && $currUser->is_admin;
    }
}
