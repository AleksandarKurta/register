<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**test*/
    public function unauthorized_users_can_not_access_admin_panel()
    {
        $user = factory('App\User')->create(['role' => 'guest']);

        $this->get('/users')
            ->assertStatus(403);
    }

    /**test*/
    public function authorized_users_can_access_admin_panel()
    {
        $user = factory('App\User')->create(['role' => 'admin']);

        $this->get('/users')
            ->assertStatus(200);
    }
}
