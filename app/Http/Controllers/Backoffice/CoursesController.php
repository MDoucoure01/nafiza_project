<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Seance;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'module_id' => 'required',
            'course_type_id' => 'required',
            'description' => 'string|max:225',
        ]);

        $course = new Course();
        $course->title = $request->name;
        // Enregistrement du fichier
        if ($request->file('file')) {
            $filePath = $request->file('file')->store('courses', 'public'); // Enregistre dans le disque public
            $course->file = $filePath;
        }

        $course->module_id = $request->module_id;
        $course->course_type_id = $request->course_type_id;
        $course->description = $request->description;
        $course->save();

        toastr()->success('Cours créé avec succès !');
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'module_id' => 'required',
            'course_type_id' => 'required',
            'description' => 'string|max:225',
        ]);

        $course = Course::findOrFail($request->id);
        $course->title = $request->name;
        // Enregistrement du fichier
        if ($request->file('file')) {
            $filePath = $request->file('file')->store('courses', 'public'); // Enregistre dans le disque public
            $course->file = $filePath;
        }

        $course->module_id = $request->module_id;
        $course->course_type_id = $request->course_type_id;
        $course->description = $request->description;
        $course->save();

        toastr()->success('Cours créé avec succès !');
        return back();
    }

    public function delete(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->delete();

        toastr()->error('Cours supprimé avec succès !');
        return back();
    }

    // Seances controllers

    public function createSeance(Request $request){
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required|date',
            'course_id' => 'required',
            'professor_id' => 'required',
            'cohort_id' => 'required',
            'note' => 'max:225',
        ]);

        $course = new Seance();
        $course->course_id = $request->course_id;
        $course->professor_id = $request->professor_id;
        $course->cohort_id = $request->cohort_id;
        $course->note = $request->note;
        $course->date = $request->date;
        $course->start_time = $request->start_time;
        $course->end_time = $request->end_time;
        $course->save();

        toastr()->success('Séance de cours ajoutée avec succès !');
        return back();
    }
    public function updateSeance(Request $request){
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required|date',
            'course_id' => 'required',
            'professor_id' => 'required',
            'cohort_id' => 'required',
            'note' => 'max:225',
        ]);

        $seance = Seance::findOrFail($request->id);
        $seance->course_id = $request->course_id;
        $seance->professor_id = $request->professor_id;
        $seance->cohort_id = $request->cohort_id;
        $seance->note = $request->note;
        $seance->date = $request->date;
        $seance->start_time = $request->start_time;
        $seance->end_time = $request->end_time;
        $seance->save();

        toastr()->success('Séance de cours modifiée avec succès !');
        return back();
    }

    public function deleteSeance(Request $request)
    {
        $seance = Seance::findOrFail($request->id);
        $seance->delete();

        toastr()->error('Séance de cours supprimée avec succès !');
        return back();
    }
}
