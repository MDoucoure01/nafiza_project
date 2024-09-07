<?php

namespace App\Http\Requests\Auth;

use App\Rules\Active;
use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class LoginRequest extends FormRequest
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
            "username" => "required",
            "password" => "required"
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Le champ nom d’utilisateur est requis.',
            'password.required'  => 'Le champ mot de passe est requis.',
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
}
