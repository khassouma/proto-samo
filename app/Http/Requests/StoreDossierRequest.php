<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class StoreDossierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->isChefEquipe();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'matricule' => 'required|unique:dossiers',
            'nombre_fiches' => 'required|integer|min:1',
            'type' => 'required|in:pharmacie,soins,examens',
            'categorie' => 'required|in:hopital,cscom,normal',
        ];
    }
}
