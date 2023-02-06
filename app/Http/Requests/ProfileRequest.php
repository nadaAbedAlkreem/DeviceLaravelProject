<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;



class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'name'=> 'required' ,
             'email'=>'required|email',
             'imageUser'=>'nullable' , 
             'password' => 'nullable|min:8',
            'password_confirm' => 'nullable|same:password',

        ];
    }
    
}
