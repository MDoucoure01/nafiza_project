<?php

namespace App\Http\Requests\Bibliotheques;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BibliothequeCommentRequest extends FormRequest
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
            'content' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Le champ contenu est requis',
            'content.max' => 'Le champ contenu ne peut pas dépasser :max caractères',
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
