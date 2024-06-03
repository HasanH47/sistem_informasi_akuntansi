<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LedgerRequest extends FormRequest
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
            'account_id' => 'required|exists:accounts,id',
            'period_type' => 'required|in:range,period,month',
            'start_date' => 'required_if:period_type,range|date|nullable',
            'end_date' => 'required_if:period_type,range|date|nullable|after_or_equal:start_date',
            'period_value' => 'required_if:period_type,period|in:1_day,1_week,1_month|nullable',
            'month_value' => 'required_if:period_type,month|date_format:Y-m|nullable',
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
            'account_id.required' => 'Akun harus dipilih.',
            'account_id.exists' => 'Akun yang dipilih tidak valid.',
            'period_type.required' => 'Tipe periode harus dipilih.',
            'period_type.in' => 'Tipe periode yang dipilih tidak valid.',
            'start_date.required_if' => 'Tanggal awal harus diisi untuk tipe periode rentang tanggal.',
            'start_date.date' => 'Tanggal awal harus berupa tanggal yang valid.',
            'end_date.required_if' => 'Tanggal akhir harus diisi untuk tipe periode rentang tanggal.',
            'end_date.date' => 'Tanggal akhir harus berupa tanggal yang valid.',
            'end_date.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal awal.',
            'period_value.required_if' => 'Periode harus dipilih untuk tipe periode.',
            'period_value.in' => 'Periode yang dipilih tidak valid.',
            'month_value.required_if' => 'Bulan harus diisi untuk tipe periode bulan.',
            'month_value.date_format' => 'Bulan harus dalam format tahun-bulan (YYYY-MM).',
        ];
    }
}
