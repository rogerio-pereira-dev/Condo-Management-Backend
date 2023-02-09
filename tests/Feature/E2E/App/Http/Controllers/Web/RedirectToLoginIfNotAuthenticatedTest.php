<?php

namespace Tests\Feature\E2E\App\Http\Controllers\Web;

use Tests\TestWebCase;

class RedirectToLoginIfNotAuthenticatedTest extends TestWebCase 
{
    public function urlDataProvider() : array
    {
        return [
            'home'              => ['url' => '/'],
            'change_password'   => ['url' => '/change-password'],
            'employees'         => ['url' => '/employees'],
        ];
    }

    /**
     * @dataProvider urlDataProvider
     */
    public function testRedirectIfNotAuthenticated($url)
    {
        $this->assertGuest();
        $this->get($url)
            ->assertRedirect('/login');
    }
}
