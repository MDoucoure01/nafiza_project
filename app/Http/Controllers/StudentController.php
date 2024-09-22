<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ShareDataSession;
use App\Http\Resources\Cohorts\CohortResource;
use App\Http\Resources\COnseils\ConseilResource;
use App\Http\Resources\Students\StudentResource;
use App\Http\Resources\Subscriptions\SubscriptionResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseTrait;
use App\Models\User;
use App\Http\Resources\Users\UserResource;
use App\Models\Cohort;
use App\Models\CohortSubscription;
use App\Models\Conseil;
use App\Models\School_session;
use App\Models\Subscription;
use App\Services\ExistUser;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    use ResponseTrait;
    use ResponseTrait;

    /**
     *
     * Affiche les informations du professeur connecté.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showProfile()
    {
        // Récupère le professeur connecté
        $student = User::find(1);
        return $this->responseData("Utilisateur connecté", true, Response::HTTP_OK, UserResource::make($student));
    }

    /**
     * Met à jour les informations du professeur connecté.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . 1, // Exclut l'utilisateur avec ID 1 de la vérification d'unicité
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'specific_desease' => 'nullable|string|max:20',
            'allergies' => 'nullable|string|max:20',
        ]);

        $student = User::find(1);
        $student->update($request->only([
            'email',
            'phone',
            'address',
            'specific_desease',
            'allergies'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour avec succès.'
        ]);
    }

    public function comradeUser(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $userExist
                 */
                $userExist = new ExistUser();
                $user = $userExist->elementExist(User::class, "id", $request->id);
                if (!$user) {
                    return $this->responseData("Utilisateur non existant", false, Response::HTTP_NOT_FOUND, null);
                }
                if ($user->id != Auth::id()) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                $student = Student::where("user_id", Auth::id())->first();
                if (!$student) {
                    return $this->responseData("Utilisateur non inscrit", false, Response::HTTP_NOT_FOUND, null);
                }
                $anneeActif = School_session::where("status", true)->first();
                $UserInscrit = Subscription::where("student_id", $student->id)
                    ->where("school_session_id", $anneeActif->id)->first();
                if (!$UserInscrit) {
                    return $this->responseData("Utilisateur non inscrit", false, Response::HTTP_NOT_FOUND, null);
                }
                if (!$UserInscrit->is_active) {
                    return $this->responseData("Compte non activer", false, Response::HTTP_NOT_FOUND, null);
                }
                $CohortSubs = CohortSubscription::where("subscription_id", $UserInscrit->id)->where("is_actual", true)->first();
                if (!$CohortSubs) {
                    return $this->responseData("Pensionnaire non assigné à un cohort", false, Response::HTTP_NOT_FOUND, null);
                }
                $cohort = Cohort::find($CohortSubs->cohort_id);
                return $this->responseData("student enregistré", true, Response::HTTP_OK, CohortResource::make($cohort));

            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    public function test()
    {
        return ConseilResource::collection(Conseil::all());
    }
}
