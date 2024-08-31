<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class Active implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $field = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $user = User::where($field, request()->input('username'))->first();
        if($user && $user->isActive == 0){
            $fail("Votre compte a été bloqué, veuiller contacter notre service client");
        }
    }
}
