<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => $user->password
        ]);

        $this->actingAs($user);

        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_user_can_be_created(){

        $response = $this->post('/create',[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'is_admin' => 1,
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_be_updated(){

        $user = User::factory()->create();

        $response = $this->put('/users/edit/'.$user->id,[
            'name' => 'new name',
            'email' => $user->email,
            'password' => $user->password,
            'is_admin' => $user->is_admin,
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_be_deleted(){

        $user = User::factory()->create();

        $response = $this->delete('/users/delete/'.$user->id);

        $response->assertStatus(302);
    }
}
