<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Seance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pointing extends Component
{
    public $student;
    public $seances;

    public function mount()
    {
        if (Auth::user()) {
            // Vérifie si l'utilisateur connecté n'a pas le rôle admin ou secretary
            if (!Auth::user()->hasRole(['admin', 'secretary'])) {
                // Redirige vers une autre page (par exemple, la page d'accueil ou une page spécifique)
                return redirect()->to('https://nafiza.groupeema.com/compte/a-propos'); // Remplace le lien par celui de ton choix
            }
        }
        else{
            return redirect()->to('https://nafiza.groupeema.com/compte/a-propos'); // Remplace le lien par celui de ton choix
        }

        $this->student = Student::findOrFail(request()->student_id);
        // dd($this->student->attendances()->count());
        $now = Carbon::now();
        // Récupérer les séances d'aujourd'hui
        $todaySeances = Seance::whereDate('date', Carbon::today())->get();
        // Vérifier s'il y a une séance en cours
        $inProgressSeances = Seance::whereDate('date', Carbon::today())
            ->whereTime('start_time', '<=', $now)  // L'heure de début est inférieure ou égale à maintenant
            ->whereTime('end_time', '>=', $now)    // L'heure de fin est supérieure ou égale à maintenant
            ->get();

        // Si une séance est en cours, on la sélectionne
        if ($inProgressSeances->count() > 0) {
            $this->seances = $inProgressSeances;
        }
        // Si aucune séance en cours, prendre les séances du jour
        elseif ($todaySeances->count() > 0) {
            $this->seances = $todaySeances;
        }
        // Sinon, prendre toutes les séances
        else {
            $this->seances = Seance::orderByDesc('id')->get();
        }
    }

    public function render()
    {
        return view('livewire.backoffice.students.pointing')->layout('layouts.guest');
    }
}
