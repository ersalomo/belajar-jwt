<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $today = \Carbon\Carbon::today();
        $nextDay = $today->addDay();
        $twoWeeks = $today->addWeeks(2);
        $validStartTime = '09:00';
        $validEndTime = '16:00';

        return [
            'name_emp' => ['required'],
            'purpose' => ['required'],
            'company_name' => ['required', 'string', 'nullable'],
            'number_plate' => ['required', 'string', 'regex:/^[A-Z]{1,2}\s\d{1,4}\s[A-Z]{1,3}$/'],
            'visit_date' => ['required',
                'date_format:Y-m-d',
                "after:tomorrow",
                'before_or_equal:' . $twoWeeks->format('Y-m-d'),],
            'transportation' => ['required'],
            'visitation_type' => ['required'],
            'arrival_time' => ['required',
                'date_format:H:i',
                'after_or_equal:'.$validStartTime,
                "before_or_equal:".$validEndTime], // jam kedatangan
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'required',
            'visit_date.date_format' => 'masukkan format yang sesuai',
            'visit_date.after' => '2 hari setelah hari ini',
            'visit_date.before_or_equal' => 'maksimal 2 minggu',
            'number_plate.regex' => "number plate tidak valid"
        ];
    }
}
