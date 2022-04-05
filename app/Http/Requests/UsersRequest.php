<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|string|email|max:255',
            'password'=>'required|string|min:8|confirmed',
            'password_confirmation'=>'required|string|min:8'
        ];
    }
    public function messages ()
    {
         return[
            'name.required'=>'ユーザー名を入力してください',
            'email.required'=>'メールアドレスを入力してください',
         ];
    }
}
