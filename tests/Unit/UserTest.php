<?php

namespace Tests\Unit;


// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_render_home()
    {
        $this->get('/dashboard')->assertStatus(200);
    }

    public function login()
    {
        $this->get('/login')->assertStatus(200);
    }
}
