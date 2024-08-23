<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\School_session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchoolsessionController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'string|max:225',
        ]);

        $activeSession = School_session::where('status', 1)->first();
        if($activeSession && $request->status == 1){
            session()->flash('message', 'Une session est déjà en activité. Vous ne pouvez pas avoir deux sessions actives en même temps. <br>
            Veuillez désactiver la session en cours pour poursuivre.');
            toastr()->error('Une erreur lors du traitement !');
        }
        else{
            $schoolsession = new School_session();
            $schoolsession->name = $request->name;
            $schoolsession->slug = Str::slug($request->name);
            $schoolsession->start_date = $request->start_date;
            $schoolsession->end_date = $request->end_date;
            $schoolsession->description = $request->description;
            $schoolsession->status = $request->status;
            $schoolsession->save();
            toastr()->success('Session créée avec succès !');
        }
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'string|max:225',
        ]);

        $isSessionActive = School_session::where('id', '!=', $request->id)->where('status', 1)->count();
        if($isSessionActive > 0 && $request->status > 0){
            session()->flash('message', 'Une session est déjà en activité. Vous ne pouvez pas avoir deux sessions actives en même temps. <br>
            Veuillez désactiver la session en cours pour poursuivre.');
            toastr()->error('Une erreur lors du traitement !');
        }
        else{
            $schoolsession = School_session::findOrFail($request->id);

            $schoolsession->name = $request->name;
            $schoolsession->slug = Str::slug($request->name);
            $schoolsession->start_date = $request->start_date;
            $schoolsession->end_date = $request->end_date;
            $schoolsession->status = $request->status;
            $schoolsession->description = $request->description;
            $schoolsession->save();
            toastr()->success('Session modifiée avec succès !');
        }
        return back();
    }

    public function delete(Request $request)
    {
        $schoolsession = School_session::findOrFail($request->id);
        $schoolsession->delete();

        toastr()->success('Session supprimée avec succès !');
        return back();
    }
}
