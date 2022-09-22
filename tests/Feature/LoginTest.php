<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
      parent::setUp();

      $this->post('/register', [
        'name' => 'Helena',
        'email' => 'lena.oli1102@gmail.com',
        'password' => '12345678',
        'password_confirmation' => '12345678',
        'company_name' => 'example',
        'trading_name' => 'example LTDA',
        'adress' => 'rua tal',
        'phone' => '6723476346',
        'cnpj' => '53628746',
      ]);
      \Auth::logout();
    }

    public function test_should_login_when_valid_data()
    {
      $response = $this->post('/login', [
        'email' => 'lena.oli1102@gmail.com',
        'password' =>  \Hash::make('12345678'),
        'remember' => 'on',
      ]);
      $response->assertSessionHasNoErrors();
      // $this->assertAuthenticated();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_the_application_returns_login_when_the_route_is_accessed()
     {
         $response = $this->get('login');

         $response->assertStatus(200);
         $response->assertSeeText('Login');
     }

     public function test_shouldnt_login_when_invalid_data()
     {
          $response = $this ->post('login');

          $response->assertInvalid(['email', 'password']);
     }
}
