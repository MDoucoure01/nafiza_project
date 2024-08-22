<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Cohort;
use App\Models\Session_Cohort;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CohortsController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);

        $cohort = new Cohort();
        $cohort->name = $request->name;
        $cohort->slug = Str::slug($request->name);
        $cohort->description = $request->description;
        $cohort->save();

        if ($cohort) {
            $cohort = new Session_Cohort();
            $cohort->cohort_id = $cohort->id;
            $cohort->school_session_id = $request->school_session_id;
            $cohort->save();
        }
        // toastr()->success('Cohorte créé avec succès !');
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);

        $cohort = Cohort::findOrFail($request->id);
        $cohort->name = $request->name;
        $cohort->save();
        // toastr()->success('Cohorte modifié avec succès !');
        return back();
    }

    public function delete(Request $request)
    {
        $cohort = Cohort::findOrFail($request->id);
        $cohort->delete();

        toastr()->error('Cohorte supprimé avec succès !');
        return back();
    }
}
