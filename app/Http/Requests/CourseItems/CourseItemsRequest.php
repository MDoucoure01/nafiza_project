<?php

namespace App\Http\Requests\CourseItems;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CourseItemsRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,pdf',
            'image' => 'nullable|file|mimes:jpeg,png',
            'link' => 'nullable|url|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Le champ "cours" est requis.',
            'course_id.exists' => 'Le cours sélectionné n\'existe pas.',
            'user_id.required' => 'Le champ "utilisateur" est requis.',
            'user_id.exists' => 'L\'utilisateur sélectionné n\'existe pas.',
            'content.required' => 'Le contenu est requis.',
            'content.string' => 'Le contenu doit être une chaîne de caractères.',
            'file.file' => 'Le fichier ne peut être que un PDF.',
            'image.max' => 'L\'image ne peut pas dépasser 255 caractères.',
            'link.url' => 'Le lien doit être une URL valide.',
            'link.max' => 'Le lien ne peut pas dépasser 255 caractères.',
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
