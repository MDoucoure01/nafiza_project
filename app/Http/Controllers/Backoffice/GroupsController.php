<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\TdGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupsController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'cohort_id' => 'required',
            'description' => 'max:225|string',
        ]);

        $groupTD = new TdGroup();
        $groupTD->cohort_id = $request->cohort_id;
        $groupTD->school_session_id = $request->appActuSession->id;
        $groupTD->name = $request->name;
        $groupTD->slug = Str::slug($request->name);
        $groupTD->description = $request->description;
        $groupTD->save();

        toastr()->success('Groupe créé avec succès !');
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'cohort_id' => 'required',
            'description' => 'max:225|string',
        ]);

        $groupTD = TdGroup::findOrFail($request->id);
        $groupTD->cohort_id = $request->cohort_id;
        $groupTD->name = $request->name;
        $groupTD->slug = Str::slug($request->name);
        $groupTD->description = $request->description;
        $groupTD->save();

        toastr()->success('Groupe Modifié avec succès !');
        return back();
    }

    public function delete(Request $request)
    {
        $groupTD = TdGroup::findOrFail($request->id);
        $groupTD->delete();

        // toastr()->success('Session supprimée avec succès !');
        return back();
    }
}
