<?php

namespace App\Http\Requests\Post;

use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
            'media_link' => 'required',
            'visibility' => 'required|in:public,followers',
            'description' => 'nullable|string',
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

    public function messages()
    {
        return [
            'media_link.required' => 'Le champ media_link est requis.',
            'visibility.required' => 'Le champ visibility est requis.',
            'visibility.in' => 'Le champ visibility doit être soit "public" soit "followers".',
        ];
    }
}
