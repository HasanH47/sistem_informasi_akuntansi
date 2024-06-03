<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
    public function rules()
    {
        return [
            'transaction_date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'account' => 'required|exists:accounts,id',
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
            'transaction_date.required' => 'Tanggal transaksi harus diisi.',
            'transaction_date.date' => 'Tanggal transaksi harus berupa format tanggal yang valid.',
            'description.required' => 'Deskripsi transaksi harus diisi.',
            'description.string' => 'Deskripsi transaksi harus berupa teks.',
            'description.max' => 'Deskripsi transaksi tidak boleh lebih dari :max karakter.',
            'amount.required' => 'Jumlah transaksi harus diisi.',
            'amount.numeric' => 'Jumlah transaksi harus berupa angka.',
            'account.required' => 'Akun transaksi harus dipilih.',
            'account.exists' => 'Akun transaksi yang dipilih tidak valid.',
        ];
    }
}
