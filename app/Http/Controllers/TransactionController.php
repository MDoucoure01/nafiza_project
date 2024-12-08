<?php

namespace App\Http\Controllers;

use App\Http\Resources\Transactions\TransactionRessource;
use App\Models\School_session;
use App\Models\Student;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\transactions;
use App\Models\User;
use App\Services\ExistUser;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transactions $transactions)
    {
        //
    }

    public function getTransactionByUser(Request $request)
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
                $transaction = Transaction::where("subscription_id", $UserInscrit->id)->get();

                if (!$transaction) {
                    return $this->responseData("Aucun payement disponible", true, Response::HTTP_OK, TransactionRessource::collection($transaction));
                }
                return $this->responseData("Tous les payements effectué", true, Response::HTTP_OK, TransactionRessource::collection($transaction));

            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}
