<?php

namespace App\Livewire\Backoffice;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class HomeComponent extends Component
{
    public $nbrStudentsActif;
    public $nbrStudentsOnLine;
    public $nbrStudentsFem;
    public $nbrCourses;
    public $months = [];
    public $attendancesByMonthA = [];
    public $attendancesByMonthB = [];

    public function mount()
    {
        $sessionId = request()->appActuSession->id;
        $this->nbrStudentsActif = Student::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId)
                  ->where('is_active', 1);
        })->count();

        $this->nbrStudentsOnLine = Student::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId)
                  ->where('online', 1);
        })->count();

        // Récupérer le nombre d'étudiantes de sexe féminin
        $this->nbrStudentsFem = Student::whereHas('user', function ($query) {
            $query->where('sexe', 'F');
        })->count();

        $this->nbrCourses = Course::count();

        // Exemple d'utilisation
        $startDate = request()->appActuSession->start_date;
        $endDate = request()->appActuSession->end_date;

        // Appel correct de la méthode getMonthsBetweenDates()
        $this->months = $this->getMonthsBetweenDates($startDate, $endDate);

        // Récupérer la somme des présences pour chaque mois
        $this->attendancesByMonthA = $this->getAttendanceByMonthCohortA($startDate, $endDate);
        $this->attendancesByMonthB = $this->getAttendanceByMonthCohortB($startDate, $endDate);
        // dd($this->attendancesByMonth);
    }


    function getMonthsBetweenDates($startDate, $endDate)
    {
        // Transformer les dates en objets Carbon
        $start = Carbon::parse($startDate)->startOfMonth();
        $end = Carbon::parse($endDate)->endOfMonth();

        // Créer une période de dates mensuelles
        $period = CarbonPeriod::create($start, '1 month', $end);

        // Tableau pour stocker les mois
        $months = [];

        // Parcourir chaque mois et formater le nom du mois en français
        foreach ($period as $date) {
            $months[] = $date->translatedFormat('F'); // "F" donne le nom complet du mois
        }

        return $months;
    }

    // Fonction pour récupérer les présences par mois
    public function getAttendanceByMonthCohortA($startDate, $endDate)
    {
        $start = Carbon::parse($startDate)->startOfMonth();
        $end = Carbon::parse($endDate)->endOfMonth();
        $period = CarbonPeriod::create($start, '1 month', $end);

        $attendancesByMonthA = [];

        // Parcourir chaque mois dans la période
        foreach ($period as $date) {
            // Début et fin du mois courant
            $monthStart = $date->copy()->startOfMonth();
            $monthEnd = $date->copy()->endOfMonth();

            // Requête pour compter les présences dans ce mois
            $attendanceCount = Attendance::join('students', 'attendances.student_id', '=', 'students.id')
                                            ->join('subscriptions', 'students.id', '=', 'subscriptions.student_id')
                                            ->join('cohort_subscriptions', 'subscriptions.id', '=', 'cohort_subscriptions.subscription_id')
                                            ->where('cohort_subscriptions.cohort_id', 1)
                                            ->whereBetween('attendance_date', [$monthStart, $monthEnd])
                                            ->count();

            // Ajouter uniquement le nombre de présences au tableau
            $attendancesByMonthA[] = $attendanceCount;
        }

        return $attendancesByMonthA;
    }

    // Fonction pour récupérer les présences par mois
    public function getAttendanceByMonthCohortB($startDate, $endDate)
    {
        $start = Carbon::parse($startDate)->startOfMonth();
        $end = Carbon::parse($endDate)->endOfMonth();
        $period = CarbonPeriod::create($start, '1 month', $end);

        $attendancesByMonthB = [];

        // Parcourir chaque mois dans la période
        foreach ($period as $date) {
            // Début et fin du mois courant
            $monthStart = $date->copy()->startOfMonth();
            $monthEnd = $date->copy()->endOfMonth();

            // Requête pour compter les présences dans ce mois
            $attendanceCount = Attendance::join('students', 'attendances.student_id', '=', 'students.id')
                                            ->join('subscriptions', 'students.id', '=', 'subscriptions.student_id')
                                            ->join('cohort_subscriptions', 'subscriptions.id', '=', 'cohort_subscriptions.subscription_id')
                                            ->where('cohort_subscriptions.cohort_id', 2)
                                            ->whereBetween('attendance_date', [$monthStart, $monthEnd])
                                            ->count();

            // Ajouter uniquement le nombre de présences au tableau
            $attendancesByMonthB[] = $attendanceCount;
        }

        return $attendancesByMonthB;
    }

    public function render()
    {
        return view('livewire.backoffice.home-component')->layout('layouts.app');
    }
}
