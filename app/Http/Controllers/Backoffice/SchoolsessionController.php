<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Cohort;
use App\Models\School_session;
use App\Models\Session_Cohort;
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

    public function addCohort(Request $request)
    {
        $session = School_session::findOrFail($request->session_id);
        $addCohortsNumber = $request->cohorts_number;

        if($session->cohorts->count() > 0){
            $sessionCohortsNumber = $session->cohorts->count();
            for ($i = $sessionCohortsNumber; $i <= $addCohortsNumber; $i++) {
                $session = Session_Cohort::where('cohort_id', $i)
                                        ->where('school_session_id', $request->session_id)
                                        ->first();
                if (!$session) {
                    $sessionCohort = new Session_Cohort();
                    $sessionCohort->cohort_id = $i;
                    $sessionCohort->school_session_id = $request->session_id;
                    $sessionCohort->save();
                }
            }
        }
        else{
            for ($i=1; $i <= $addCohortsNumber; $i++) {
                $sessionCohort = new Session_Cohort();
                $sessionCohort->cohort_id = $i;
                $sessionCohort->school_session_id = $request->session_id;
                $sessionCohort->save();
            }
        }

        toastr()->success('Cohortes ajoutées avec succès !');
        return back();
    }

    public function removeCohort(Request $request)
    {
        // $cohort = Cohort::findOrFail($request->id);
        // Supprimer la relation de la table pivot
        // $cohort->schoolsessions()->detach($cohort->id);
        
        Session_Cohort::where('cohort_id', $request->id)->delete();

        // Envoyer un message de confirmation (facultatif)
        toastr()->error('Cohorte enlevée avec succès !');
        return back();
    }

}
