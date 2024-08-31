<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseTrait;
use App\Models\User;
use App\Http\Resources\Users\UserResource;


class ProfessorController extends Controller
{
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
        $professor = User::find(1);
        return $this->responseData("Utilisateur connecté", true, Response::HTTP_OK, UserResource::make($professor));       
       
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
            'emergency_number' => 'nullable|string|max:20',
        ]);

        $professor = User::find(1);
        $professor->update($request->only([
            'email',
            'phone',
            'address',
            'emergency_number',
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour avec succès.'
        ]);
    }
}
