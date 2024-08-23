<?php

use App\Http\Controllers\Backoffice\SchoolsessionController;
use App\Livewire\Backoffice\HomeComponent;
use App\Livewire\Backoffice\Schoolsessions\Cohorts;
use App\Livewire\Backoffice\Schoolsessions\EditSession;
use App\Livewire\Backoffice\Schoolsessions\GroupeTD;
use App\Livewire\Backoffice\Students\AddStudent;
use App\Livewire\Backoffice\Students\ListStudent;
use App\Livewire\Backoffice\Schoolsessions\ListSessions;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin|secretary'
])->group(function () {
    Route::get('/', HomeComponent::class)->name('home');
    Route::get('/pensionnaire/nouveau', AddStudent::class)->name('student.add');
    Route::get('/pensionnaires', ListStudent::class)->name('students.list');
    Route::get('/sessions', ListSessions::class)->name('sessions.list');
    Route::get('/session/edit/{id}', EditSession::class)->name('session.edit');
    Route::put('/create-session', [SchoolsessionController::class, 'create'])->name('session.create');
    Route::put('/sessions/update', [SchoolsessionController::class, 'update'])->name('session.update');
    Route::put('/delete-session', [SchoolsessionController::class, 'delete'])->name('session.delete');
    Route::get('/groupes-td', GroupeTD::class)->name('groupes.td');
    Route::get('/cohortes', Cohorts::class)->name('cohorts.list');
});
