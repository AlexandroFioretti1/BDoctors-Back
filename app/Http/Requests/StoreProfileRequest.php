<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'phone_number' => ['nullable','numeric'],
            'address' => ['nullable', 'max:255'],
            'doctor_image' => ['nullable','image', 'max:955'], //  
            'cv' => ['nullable','file' , 'mimes:pdf', 'max:5000'], //  
            'performances' => ['nullable'],
            'specializations' => ['exists:specializations,id'],
            // 'user_id' => ['nullable']
        ];
    }
}