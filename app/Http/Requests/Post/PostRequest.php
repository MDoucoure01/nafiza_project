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
            'media_type' => 'required|string|in:image,video',
            'media_link' => 'required',
            'media_thumbnail' => 'required_if:media_type,video|image|mimes:jpg,jpeg,png,gif,mp4|max:5120',
            'visibility' => 'required|in:public,followers',
            'description' => 'nullable|string', // You can adjust this according to your needs
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
            'media_type.required' => 'Le champ media_type est requis.',
            'media_type.in' => 'Le champ media_type doit être soit "image" soit "video".',
            'media_link.required' => 'Le champ media_link est requis.',
            'media_thumbnail.required_if' => 'Le champ media_thumbnail est requis lorsque le media_type est "video".',
            'media_thumbnail.image' => 'Le champ media_thumbnail doit être une image.',
            'media_thumbnail.mimes' => 'Le champ media_thumbnail doit être une image de type jpg, jpeg, png, gif ou un fichier vidéo de type mp4.',
            'media_thumbnail.max' => 'Le champ media_thumbnail ne doit pas dépasser 5120 Ko.',
            'visibility.required' => 'Le champ visibility est requis.',
            'visibility.in' => 'Le champ visibility doit être soit "public" soit "followers".',
        ];
    }
}
