<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_basic_user_has_aosp_role()
    {
        $role = Role::create([
            'guard' => 'web',
            'name' => 'aosp'
        ]);
        $user = User::factory()->create();
        $user->assignRole($role);
        $this->assertTrue($user->hasRole($role->name));
    }
}
