<?php

namespace App\Policies;

use App\User;
use App\Tag;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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

    public function view(User $user)
    {
      return $user->can('view-tag');
    }

    public function create(User $user)
    {
      return $user->can('create-tag');
    }

    public function manage(User $user, Tag $tag)
    {
      return $user->can('manage-tag');
    }
}
