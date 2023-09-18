<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends FormRequest
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
            'user'        => ['nullable', 'exists:users,id'],
            'amount'      => ['required', 'numeric', 'min:1'],
            'wallet_slug' => ['required', 'string', 'max:255'],
        ];
    }
}
