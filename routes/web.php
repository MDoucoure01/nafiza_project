<?php

use App\Http\Controllers\Backoffice\CohortsController;
use App\Http\Controllers\Backoffice\GroupsController;
use App\Http\Controllers\Backoffice\ProfessorsController;
use App\Http\Controllers\Backoffice\SchoolsessionController;
use App\Http\Controllers\Backoffice\StudentsController;
use App\Livewire\Backoffice\HomeComponent;
use App\Livewire\Backoffice\Professors\AddProfessor;
use App\Livewire\Backoffice\Professors\ListProfessors;
use App\Livewire\Backoffice\Professors\ProfessorProfile;
use App\Livewire\Backoffice\Schoolsessions\Cohorts;
use App\Livewire\Backoffice\Schoolsessions\EditCohort;
use App\Livewire\Backoffice\Schoolsessions\EditGroup;
use App\Livewire\Backoffice\Schoolsessions\EditSession;
use App\Livewire\Backoffice\Schoolsessions\GroupeTD;
use App\Livewire\Backoffice\Schoolsessions\ShowCohort;
use App\Livewire\Backoffice\Schoolsessions\ShowGroup;
use App\Livewire\Backoffice\Schoolsessions\ShowSession;
use App\Livewire\Backoffice\Students\AddStudent;
use App\Livewire\Backoffice\Students\AddStudentsToCohort;
use App\Livewire\Backoffice\Students\AddStudentsToGroup;
use App\Livewire\Backoffice\Students\ListStudent;
use App\Livewire\Backoffice\Schoolsessions\ListSessions;
use App\Livewire\Backoffice\Students\StudentPending;
use App\Livewire\Backoffice\Students\StudentProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:root|admin|secretary'
])->group(function () {
    Route::get('/', HomeComponent::class)->name('home');

    Route::get('/pensionnaire/nouveau', AddStudent::class)->name('student.add');
    Route::get('/pensionnaires', ListStudent::class)->name('students.list');
    Route::get('/pensionnaires/en-attente', StudentPending::class)->name('students.pending.list');
    Route::get('/pensionnaire/profile/{id}', StudentProfile::class)->name('student.profile');
    Route::put('/create-student', [StudentsController::class, 'create'])->name('student.create');
    Route::put('/update-student', [StudentsController::class, 'update'])->name('student.update');

    Route::get('/professeurs', ListProfessors::class)->name('professors.list');
    Route::get('/professeur/profile/{id}', ProfessorProfile::class)->name('professor.profile');

    Route::get('/session/{slug}', ShowSession::class)->name('session.show');
    Route::get('/sessions', ListSessions::class)->name('sessions.list');

    Route::get('/cohorte/{slug}/nouveaux-pensionnaire', AddStudentsToCohort::class)->name('cohort.new.students');
    Route::get('/cohorte/{slug}', ShowCohort::class)->name('cohort.show');
    Route::get('/cohortes', Cohorts::class)->name('cohorts.list');

    Route::get('/groupe/{slug}/nouveaux-pensionnaire', AddStudentsToGroup::class)->name('group.new.students');
    Route::get('/groupe/{slug}', ShowGroup::class)->name('group.show');
    Route::get('/groupes-td', GroupeTD::class)->name('groupes.td');
});


Route::get('/generate-qr-code', [QrCodeController::class, 'generate']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:root|admin'
])->group(function () {
    Route::get('/session/edit/{id}', EditSession::class)->name('session.edit');
    Route::put('/create-session', [SchoolsessionController::class, 'create'])->name('session.create');
    Route::put('/sessions/update', [SchoolsessionController::class, 'update'])->name('session.update');
    Route::put('/delete-session', [SchoolsessionController::class, 'delete'])->name('session.delete');
    Route::put('/session-add-cohort', [SchoolsessionController::class, 'addCohort'])->name('session.cohort.add');
    Route::put('/session-remove-cohort', [SchoolsessionController::class, 'removeCohort'])->name('session.cohort.remove');

    Route::put('/create-cohort', [CohortsController::class, 'create'])->name('cohort.create');
    Route::get('/cohorte/edit/{id}', EditCohort::class)->name('cohort.edit');
    Route::put('/cohorte/update', [CohortsController::class, 'update'])->name('cohort.update');
    Route::put('/delete-cohort', [CohortsController::class, 'delete'])->name('cohort.delete');

    Route::put('/create-group', [GroupsController::class, 'create'])->name('group.create');
    Route::get('/groupe/edit/{id}', EditGroup::class)->name('group.edit');
    Route::put('/group-update', [GroupsController::class, 'update'])->name('group.update');
    Route::put('/delete-group', [GroupsController::class, 'delete'])->name('group.delete');

    Route::get('/professeur/nouveau', AddProfessor::class)->name('professor.add');
    Route::put('/create-professor', [ProfessorsController::class, 'create'])->name('professor.create');
});
