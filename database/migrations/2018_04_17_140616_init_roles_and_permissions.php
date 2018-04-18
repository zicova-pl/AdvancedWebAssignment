<?php
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Define role
        $admin = Bouncer::role()->create([
          'name' => 'admin',
          'title' => 'Administrator',
        ]);

        $user = Bouncer::role()->create([
          'name' => 'user',
          'title' => 'User',
        ]);

        //Define abilities
        $viewUser = Bouncer::ability()->create([
          'name' => 'view-user',
          'title' => 'View User',
        ]);

        $createUser = Bouncer::ability()->create([
          'name' => 'create-user',
          'title' => 'Create User',
        ]);
        $manageUser = Bouncer::ability()->create([
          'name' => 'manage-user',
          'title' => 'Manage User',
        ]);

        $viewPost = Bouncer::ability()->create([
          'name' => 'view-post',
          'title' => 'View Post',
        ]);

        $createPost = Bouncer::ability()->create([
          'name' => 'create-post',
          'title' => 'Create Post',
        ]);

        $managePost = Bouncer::ability()->create([
          'name' => 'manage-post',
          'title' => 'Manage Post',
        ]);

        $viewTag = Bouncer::ability()->create([
          'name' => 'view-tag',
          'title' => 'View Tag',
        ]);

        $createTag = Bouncer::ability()->create([
          'name' => 'create-tag',
          'title' => 'Create Tag',
        ]);

        $manageTag = Bouncer::ability()->create([
          'name' => 'manage-tag',
          'title' => 'Manage Tag',
        ]);
        //Assign abilities to roles
        Bouncer::allow($admin)->to($viewUser);
        Bouncer::allow($admin)->to($manageUser);
        Bouncer::allow($admin)->to($viewPost);
        Bouncer::allow($admin)->to($managePost);
        Bouncer::allow($admin)->to($viewTag);
        Bouncer::allow($admin)->to($manageTag);

        Bouncer::allow($user)->to($createUser);
        Bouncer::allow($user)->to($viewPost);
        Bouncer::allow($user)->to($createPost);
        Bouncer::allow($user)->to($managePost);
        Bouncer::allow($user)->to($viewTag);
        Bouncer::allow($user)->to($createTag);
        Bouncer::allow($user)->to($manageTag);

        //make the first user an Admin
        $user = User::find(1);
        Bouncer::assign('admin')->to($user);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
