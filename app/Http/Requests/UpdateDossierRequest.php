<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDossierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) Auth::user()?->isChefEquipe();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tiers_payant' => 'required|string|max:255',
            'dg' => 'required|string|max:255',
            'nombre_fiches' => 'required|integer|min:0',

            'type' => 'required|in:pharmacie,soins,examens',
            'categorie' => 'required|in:hopital,cscom,normal',

            'statut' => 'required|in:non_liquide,en_liquidation,pre_controle,valide,archive',

            'chef_equipe_id' => 'nullable|exists:users,id',

            'has_issue' => 'nullable|boolean',
            'issue_note' => 'nullable|string',

            'date_reception' => 'nullable|date',
            'date_validation' => 'nullable|date',
            'issue_resolved_at' => 'nullable|date',
        ];
    }
}
