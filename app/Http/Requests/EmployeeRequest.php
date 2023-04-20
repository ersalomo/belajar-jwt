<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'firstname'  => 'required|string',
            'lastname'   => 'string',
            'username'   => 'required|string|alpha_num',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'picture'    => 'file|max:2048|image',
//            'picture'    => 'mimes:image/png,image/jpeg,image/jpg|file|max:2048',
            'password'   => 'required|string',
            'is_blocked' => 'string',
            'department' => 'string',
            'title'      => 'string',
        ];
    }
    public function messages()
    {
        return array(
            '*.required' => 'Kolom ini tidak boleh kosong!',
            'picture.mimes' => 'File harus berupa gambar',
            '*.string' => 'Kolom ini harus berupa string',
        );
    }
}
