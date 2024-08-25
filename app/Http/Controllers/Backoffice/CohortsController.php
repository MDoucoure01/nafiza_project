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
            'description' => 'string|max:225',
        ]);

        $cohort = new Cohort();
        $cohort->name = $request->name;
        $cohort->slug = Str::slug($request->name);
        $cohort->description = $request->description;
        $cohort->save();

        toastr()->success('Cohorte créée avec succès !');
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'string|max:225',
        ]);

        $cohort = Cohort::findOrFail($request->id);
        $cohort->name = $request->name;
        $cohort->slug = Str::slug($request->name);
        $cohort->description = $request->description;
        $cohort->save();

        toastr()->success('Cohorte modifiée avec succès !');
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
