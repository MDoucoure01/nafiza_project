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
                return redirect()->to('https://example.com'); // Remplace le lien par celui de ton choix
            }
        }
        else{
            return redirect()->to('https://example.com'); // Remplace le lien par celui de ton choix
        }

        $this->student = Student::findOrFail(request()->student_id);

        $todaySeances = Seance::whereDate('date', Carbon::today())->get();
        if($todaySeances->count() > 0){
            $this->seances = $todaySeances;
        }
        else{
            $this->seances = Seance::all();
        }
    }

    public function render()
    {
        return view('livewire.backoffice.students.pointing')->layout('layouts.guest');
    }
}
