<?php

namespace App\Http\Requests\user;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UserRequest extends FormRequest
{
    use ResponseTrait;
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
            'lastname' => 'nullable|string|max:30',
            'firstname' => 'nullable|string|max:30',
            'pseudo' => 'nullable|string|max:20',
            'phone' => 'nullable|string|unique:users',
            'profil' => 'nullable|string',
            'isActive' => 'boolean',
            'email' => 'nullable|string|email|unique:users|max:255',
            'password' => 'required|string',
            'id_unknown' => 'nullable|string',
            'email_verified_at' => 'nullable|date',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $message = implode(', ', $errors);
        throw new HttpResponseException(
            $this->responseData($message, false, Response::HTTP_BAD_REQUEST, [])
        );
    }

    public function messages(): array
    {
        return [
            'lastname.max' => 'Le nom de famille ne doit pas dépasser 30 caractères.',
            'firstname.max' => 'Le prénom ne doit pas dépasser 30 caractères.',
            'pseudo.max' => 'Le pseudo ne doit pas dépasser 20 caractères.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'email.unique' => 'Cet e-mail est déjà utilisé.',
            'email.email' => "L'adresse e-mail n'est pas valide.",
            'email.max' => "L'adresse e-mail ne doit pas dépasser 30 caractères.",
            'password.required' => 'Le champ mot de passe est obligatoire.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'profil.string' => 'Le profil doit être une chaîne de caractères.',
            'isActive.boolean' => 'La valeur de l\'état actif doit être booléenne.',
            'id_unknown.string' => 'L\'identifiant inconnu doit être une chaîne de caractères.',
            'email_verified_at.date' => 'La date de vérification de l\'e-mail doit être une date valide.',
        ];
    }


}
