<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'account_name' => 'required|string|max:255',
            'account_type' => 'required|string|in:asset,liability,equity,revenue,expense',
            'subtype' => [
                'required_if:account_type,asset,liability',
                'string',
                function ($attribute, $value, $fail) {
                    $validSubtypes = [
                        'asset' => ['Activa Lancar', 'Activa Tetap'],
                        'liability' => ['Hutang Lancar', 'Hutang Jangka Panjang'],
                    ];
                    if (in_array($this->account_type, ['asset', 'liability'])) {
                        if (!in_array($value, $validSubtypes[$this->account_type])) {
                            $fail("The selected $attribute is invalid.");
                        }
                    } elseif (!is_null($value)) {
                        $fail("The $attribute must be null for the selected account type.");
                    }
                },
            ],
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'account_name.required' => 'Nama akun wajib diisi.',
            'account_name.string' => 'Nama akun harus berupa string.',
            'account_name.max' => 'Nama akun tidak boleh lebih dari :max karakter.',
            'account_type.required' => 'Tipe akun wajib diisi.',
            'account_type.string' => 'Tipe akun harus berupa string.',
            'account_type.in' => 'Tipe akun tidak valid.',
            'subtype.required_if' => 'Subtype wajib diisi untuk tipe akun aset atau kewajiban.',
            'subtype.string' => 'Subtype harus berupa string.',
            'description.string' => 'Deskripsi harus berupa string.',
        ];
    }
}
