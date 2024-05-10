<?php

namespace App\Http\Requests\Bibliotheques;

use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BibliothequeRequest extends FormRequest
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
            'author' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf',
            'source' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'author.required' => 'Le champ auteur est requis',
            'title.required' => 'Le champ titre est requis',
            'description.required' => 'Le champ description est requis',
            'file.required' => 'Le champ fichier est requis',
            'file.file' => 'Le champ fichier doit être un fichier',
            'file.mimes' => 'Le fichier doit être au format PDF',
            'source.string' => 'Le champ source doit être une chaîne de caractères',
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
