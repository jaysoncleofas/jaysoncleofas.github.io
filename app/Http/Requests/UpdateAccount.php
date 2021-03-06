<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateAccount extends FormRequest
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
      $userId = Auth::id();

      return [
          'username' => 'required|unique:users,username,'.$userId,
          'email' => 'required|email|unique:users,email,'.$userId
      ];
    }
}
