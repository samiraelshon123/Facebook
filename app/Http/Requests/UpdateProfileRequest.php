<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'string',
            'email' => 'email',
            'address_live' => 'string',
            'address_from' => 'string',
            'information' => 'string|min:10',
            'work_place' => 'string',
        ];
    }
}
