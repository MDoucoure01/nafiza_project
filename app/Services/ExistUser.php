<?php


namespace App\Services;

use App\Models\User;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class ExistUser
{
    use ResponseTrait;

    public function userExistByPhone($phone)
    {
        $userPhoneExist = User::where("phone", $phone)->first();
        if ($userPhoneExist) {
            return $userPhoneExist;
        }
        return null;
    }


    public function userExistByEmail($email)
    {
        $userMailExist = User::where("email", $email)->first();
        if ($userMailExist) {
            return $userMailExist;
        }
        return null;
    }


    public function elementExist($model, $key, $value)
    {
        $element = $model::where($key, $value)->first();
        if ($element) {
            return $element;
        }
        return null;
    }

    public function isValidDate($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date) !== false;
    }

    public function isAtLeastTwoYearsOld($dateNaissance)
    {
        $birthDate = Carbon::createFromFormat('Y-m-d', $dateNaissance);
        $twoYearsAgo = Carbon::now()->subYears(2);
        return $birthDate->lessThanOrEqualTo($twoYearsAgo);
    }
}
