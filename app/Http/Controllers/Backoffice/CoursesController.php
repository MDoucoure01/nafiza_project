<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
}
