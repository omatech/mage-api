<?php

namespace Omatech\Mage\Api\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Omatech\Mage\Api\Contracts\Requests\Auth\LoginRequestInterface;

class LoginRequest extends FormRequest implements LoginRequestInterface
{
    public function rules()
    {
        return [
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'required|boolean',
        ];
    }

    public function prepareForValidation()
    {
        if (! $this->has('remember_me')) {
            $this->merge(['remember_me' => false]);
        }
    }
}
