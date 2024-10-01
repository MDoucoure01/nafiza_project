<?php

use App\Http\Controllers\Backoffice\AdminsController;
use App\Http\Controllers\Backoffice\CohortsController;
use App\Http\Controllers\Backoffice\CoursesController;
use App\Http\Controllers\Backoffice\GroupsController;
use App\Http\Controllers\Backoffice\ModulesController;
use App\Http\Controllers\Backoffice\ProfessorsController;
use App\Http\Controllers\Backoffice\SchoolsessionController;
use App\Http\Controllers\Backoffice\StudentsController;
use App\Livewire\Backoffice\Courses\AddCourse;
use App\Livewire\Backoffice\Courses\AddSeance;
use App\Livewire\Backoffice\Courses\AttendanceSheet;
use App\Livewire\Backoffice\Courses\Calendar;
use App\Livewire\Backoffice\Courses\EditSeance;
use App\Livewire\Backoffice\Courses\ListCourses;
use App\Livewire\Backoffice\Courses\Modules;
use App\Livewire\Backoffice\Courses\Seances;
use App\Livewire\Backoffice\Courses\ShowCourse;
use App\Livewire\Backoffice\Courses\ShowModule;
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
use App\Livewire\Backoffice\Students\Pointing;
use App\Livewire\Backoffice\Students\StudentPending;
use App\Livewire\Backoffice\Students\StudentProfile;
use App\Livewire\Backoffice\Users\AddAdmin;
use App\Livewire\Backoffice\Users\EditAdmin;
use App\Livewire\Backoffice\Users\ListAdmin;
use Illuminate\Support\Facades\Route;

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

Route::get('/pensionnaire/pointage', Pointing::class)->name('pointing');

Route::middleware([
    'auth:sanctum',
    config(key: 'jetstream.auth_session'),
    'verified',
    'role:root|admin|secretary'
])->group(function (): void {
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

    Route::get('/module/{id}', ShowModule::class)->name('module.show');
    Route::get('/cours/liste', ListCourses::class)->name('courses.list');
    Route::get('/cours/details/{id}', ShowCourse::class)->name('course.show');

    Route::get('/cours/seances', Seances::class)->name('seances.list');
    Route::get('/cours/calendrier', Calendar::class)->name('calendar');

    Route::get('/presence/seance/{id}', AttendanceSheet::class)->name('attendance.sheet');
    Route::put('/point-student', [StudentsController::class, 'studentAttendance'])->name('student.point');

});


Route::middleware([
    'auth:sanctum',
    config(key: 'jetstream.auth_session'),
    'verified',
    'role:root|admin'
])->group(function (): void {
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

    Route::get('/cours/modules', Modules::class)->name('courses.modules');
    Route::put('/create-module', [ModulesController::class, 'create'])->name('module.create');
    Route::put('/update-module', [ModulesController::class, 'update'])->name('module.update');
    Route::put('/delete-module', [ModulesController::class, 'delete'])->name('module.delete');

    Route::get('/cours/ajouter', AddCourse::class)->name('course.add');
    Route::put('/create-course', [CoursesController::class, 'create'])->name('course.create');
    Route::put('/update-course', [CoursesController::class, 'update'])->name('course.update');
    Route::put('/delete-course', [CoursesController::class, 'delete'])->name('course.delete');

    Route::get('/cours/seance/ajouter', AddSeance::class)->name('seance.add');
    Route::get('/cours/seance/edit/{id}', EditSeance::class)->name('seance.edit');
    Route::put('/create-seance', [CoursesController::class, 'createSeance'])->name('seance.create');
    Route::put('/update-seance', [CoursesController::class, 'updateSeance'])->name('seance.update');
    Route::put('/delete-seance', [CoursesController::class, 'deleteSeance'])->name('seance.delete');

    Route::get('/administrateurs', ListAdmin::class)->name('admin.list');
    Route::get('/administrateur/ajouter', AddAdmin::class)->name('admin.add');
    Route::get('/administrateur/modifier/{id}', EditAdmin::class)->name('admin.edit');
    Route::put('/create-admin', [AdminsController::class, 'create'])->name('admin.create');
    Route::put('/update-admin', [AdminsController::class, 'update'])->name('admin.update');
    Route::put('/delete-admin', [AdminsController::class, 'delete'])->name('admin.delete');
});
