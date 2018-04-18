<?php

namespace App\Policies;

use App\User;
use App\Post;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
      return $user->can('view-post');
    }

    public function create(User $user)
    {
      return $user->can('create-post');
    }

    public function manage(User $user, Post $post)
    {
      return $user->can('manage-post');
    }

}
