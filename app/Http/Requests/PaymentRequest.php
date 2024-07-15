<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
			'orderable_id' => 'required',
			'orderable_type' => 'required|string',
			'total_amount' => 'required',
			'payment_method' => 'required|string',
			'created_by' => 'required',
			'created_by_type' => 'required|string',
        ];
    }
}
