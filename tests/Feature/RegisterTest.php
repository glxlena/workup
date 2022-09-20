<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_the_application_returns_register_view_when_register_route_accessed(){
         $response = $this->get('/register');

         $response->assertStatus(200);
         $response->assertSeeText('Cadastro de Empresas');
     }
     public function test_shouldnt_register_user_when_invalid_data()
     {
          $response = $this->post('/register');

          $response->assertRedirect()->
            assertInvalid(['name', 'email', 'password']);
     }
     public function test_should_register_user_when_valid_data()
     {
          $response = $this -> post('/register', [
            'name' => 'Helena',
            'email' => 'lena.oli1102@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'cpf' => '12345678901',
            'company_phone' => '0987654321',
            'cnpj' => '53628746',
            'phone' => '6723476346',
            'company_name' => 'example',
            'trading_name' => 'example LTDA',
            'adress' => 'rua tal',
            'type' => 'Gerente'
          ]);

          $response->assertRedirect()->assertSessionHasNoErrors();

          $this->assertDatabaseHas('users', [
                'email' => 'lena.oli1102@gmail.com',
            ]);

          $this->assertDatabaseHas('establishments',[
                'cnpj' => '53628746',
          ]);
     }
}
