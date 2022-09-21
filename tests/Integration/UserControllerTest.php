<?php

namespace Tests\Integration;

use App\Models\UserEloquent;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testLogin()
    {
        $user = UserEloquent::find(1);
        $this->actingAs($user)
            ->withHeaders(['accept' => 'application/json'])
            ->get('api/user')
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'name' => $user->name]);
    }
}
