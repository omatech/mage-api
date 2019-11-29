<?php

namespace Omatech\Mage\Api\Tests\Http\Auth;

use Omatech\Mage\Api\Tests\BaseTestCase;
use Omatech\Mage\Core\Mage;

class LoginControllerTest extends BaseTestCase
{
    public function testSuccessfulLoginUser()
    {
        $user = Mage::domain('Users');
        $user->setName('test');
        $user->setLanguage('es');
        $user->setEmail('test@test.com');
        $user->setPassword(bcrypt('1234'));
        $user->save();

        $response = $this->post(route('auth.login'), [
            'email'    => $user->getEmail(),
            'password' => '1234',
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at',
        ])->assertStatus(200);
    }

    public function testSuccessfulLoginUserWithRememberMe()
    {
        $user = Mage::domain('Users');
        $user->setName('test');
        $user->setLanguage('es');
        $user->setEmail('test@test.com');
        $user->setPassword(bcrypt('1234'));
        $user->save();

        $response = $this->post(route('auth.login'), [
            'email'       => $user->getEmail(),
            'password'    => '1234',
            'remember_me' => true,
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at',
        ])->assertStatus(200);
    }

    public function testInvalidLoginUser()
    {
        $response = $this->post(route('auth.login'), [
            'email'       => 'test@test.com',
            'password'    => '1234',
        ]);

        $response->assertStatus(401);
    }
}
