<?php

namespace App\Http\Controllers;

use App\Http\Resources\Textbook\TextBookResource;
use App\Models\Course;
use App\Models\Textbook;
use App\Models\Professor;
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
            'course_id' => 'required|exists:courses,id',
            'content' => 'required|string|max:1000',
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
                $seanceExist = Course::find($validated['course_id']);
                if (!$seanceExist) {
                    return $this->responseData("Oops, cours non trouvé", false, Response::HTTP_NOT_FOUND);
                }

                // Créer le cahier de texte avec les dates
                $textBook = Textbook::create([
                    "professor_id" => $validated['professor_id'],
                    "course_id" => $validated['course_id'],
                    "content" => $validated['content'],
                    "start_date" => $validated['start_date'],
                    "end_date" => $validated['end_date'],
                ]);
                return $this->responseData(
                    "Merci, émargement enregistré avec succès",
                    true, Response::HTTP_OK,
                    TextBookResource::make($textBook)
                );
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }

    public function index()
    {
        try {
            // Get the current month and year
//            $currentMonth = now()->month;
//            $currentYear = now()->year;

            // Retrieve the textbooks for the current month and year, with necessary relationships
            $textbooks = Textbook::with(['professor', 'course.module'])
//                ->whereMonth('created_at', $currentMonth)
//                ->whereYear('created_at', $currentYear)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($textbook) {
                    return [
                        'date' => $textbook->created_at->format('Y-m-d'),
                        'module' => $textbook->course->module->name,
                        'course' => $textbook->course->title,
                        'content' => $textbook->content
                    ];
                });

            return $this->responseData("Liste des cahiers de textes récupérés avec succès", true, Response::HTTP_OK, $textbooks);

        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }
}

