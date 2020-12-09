<?php

namespace App\Policies;

use App\Models\Lending;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LendingPolicy
{
    use HandlesAuthorization;
    public function viewAll(User $user)
    {
        return $user->role==='librarian';
    }
    public function delete(User $user)
    {
        return $user->role==='librarian';
    }
}
