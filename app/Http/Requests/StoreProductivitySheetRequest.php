<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductivitySheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->id?->isChefEquipe();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'team_id' => 'required|exists:teams,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $exists = \App\Models\ProductivitySheet::where('team_id', $this->team_id)
                ->whereDate('date', $this->date)
                ->exists();

            if ($exists) {
                $validator->errors()->add('date', 'Une feuille existe déjà pour cette équipe à cette date.');
            }
        });
    }
}
