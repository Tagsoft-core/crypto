<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'user'   => ['required', 'email', 'exists:users,email'],
            'amount' => ['required', 'numeric', 'min:1'],
            'wallet' => ['required', 'string', 'max:255', 'exists:wallets,slug'],
        ];
    }
}
