<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
//            'kode_emp' => ['required', 'string', 'exists:kode_emps,kode_emp'],
            'name_emp' => ['required'],
            'purpose' => ['required'],
            'company_name' => ['required','string', 'nullable'],
            'number_plate' => ['required','string', 'nullable'],
            'visit_date' => ['required'],
            'transportation' => ['required'],
            'visitation_type' => ['required'],
//            'status' => ['required'],
            'arrival_time' => ['required'], // jam kedatangan
        ];
    }

    public function messages(): array
    {
        return [
//            'kode_emp.exists' => 'Kode karyawan tidak ditemukan',
//            'kode_emp.required' => 'kolom ini harus diisi',
            '*.required' => 'required',
//            'purpose.required' => 'Kolom ini tidak boleh kosong',
        ];
    }
}
