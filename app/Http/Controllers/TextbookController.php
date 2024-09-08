<?php
namespace App\Http\Controllers;

use App\Models\Textbook;
use App\Models\Professor;
use App\Models\Seance;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class TextbookController extends Controller
{
    use ResponseTrait;
    public function store(Request $request)
    {
        // Obtenir la date actuelle
        $currentDate = Carbon::today();

        // Valider les données de la requête, y compris les dates
        $validated = $request->validate([
            'professor_id' => 'required|exists:professors,id',
            'seance_id' => 'required|exists:seances,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date|before_or_equal:' . $currentDate,
            'end_date' => 'required|date|after_or_equal:' . $currentDate,
        ]);

        try {
            return DB::transaction(function () use ($request, $validated) {
                // Vérifier si le professeur existe
                $professorExist = Professor::find($validated['professor_id']);
                if (!$professorExist) {
                    return $this->responseData("Oops, professeur non trouvé", false, Response::HTTP_NOT_FOUND);
                }

                // Vérifier si la séance existe
                $seanceExist = Seance::find($validated['seance_id']);
                if (!$seanceExist) {
                    return $this->responseData("Oops, séance non trouvée", false, Response::HTTP_NOT_FOUND);
                }

                // Créer le cahier de texte avec les dates
                $textBook = Textbook::create([
                    "professor_id" => $validated['professor_id'],
                    "seance_id" => $validated['seance_id'],
                    "title" => $validated['title'],
                    "description" => $validated['description'],
                    "start_date" => $validated['start_date'],
                    "end_date" => $validated['end_date'],
                ]);

                return $this->responseData("Cahier de texte créé avec succès", true, Response::HTTP_OK, $textBook);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }

   
}
