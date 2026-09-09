<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * The home route sits behind the "auth" middleware, so a guest is sent
     * to the login screen rather than being served the application shell.
     */
    public function test_guests_are_redirected_to_the_login_screen(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }
}
