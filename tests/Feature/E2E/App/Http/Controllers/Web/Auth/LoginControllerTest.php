<?php

namespace Tests\Feature\E2E\App\Http\Controllers\Web\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;

class LoginControllerTest extends TestCase
{
    public function testRenderLoginPage()
    {
        $this->assertGuest()
            ->get('/login')
            ->assertSuccessful()
            ->assertInertia(fn (AssertableInertia $page) => 
                $page->component('Auth/Login')
            );
    }

    public function testAuthUserCantAccessLoginPage()
    {
        $this->actingAs($this->userAdmin)
            ->get('/login')
            ->assertSuccessful()
            ->assertRedirect('/');
    }
}
