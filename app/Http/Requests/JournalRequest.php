<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
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
            'transaction_id' => 'required|exists:transactions,id',
            'entry_type' => 'required|in:debit,credit',
            'amount' => 'required|string',
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
            'transaction_id.required' => 'ID Transaksi harus diisi.',
            'transaction_id.exists' => 'ID Transaksi yang dimasukkan tidak valid.',
            'entry_type.required' => 'Tipe entri harus diisi.',
            'entry_type.in' => 'Tipe entri harus berupa "debit" atau "credit".',
            'amount.required' => 'Jumlah harus diisi.',
        ];
    }
}
