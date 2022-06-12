<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $user = $this->route('user');
        return [
            'name' => 'required',
            // Logic for findOrFail
            // 'username' => 'unique:users,username,'.$this->user.'|required',
            'username' => 'unique:users,username,'.$user->id.'|required',
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id
            ],
            'password' => 'sometimes'
        ];
    }
}