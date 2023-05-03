<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
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
            'id_appmt' => ['required'],
            'visit_date' => ['nullable'],
            'checkin' => ['integer'],
            'checkout' => ['integer'],
            'notes' => ['nullable', 'string'],
        ];
    }
    public function messages()
    {
        return array(
            '*.required' => 'Kolom ini tidak boleh kosong!',
            '*.integer' => 'Kolom ini harus berupa angka!',
        );
    }
}
