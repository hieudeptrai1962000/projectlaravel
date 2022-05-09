<?php

use App\Http\Controllers\Student_subject;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\UpdateSubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('faculty', \App\Http\Controllers\FacultyController::class);
Route::resource('subject', SubjectsController::class);
Route::resource('student', StudentsController::class);
Route::resource('result', Student_subject::class);
Route::resource('updatesubject', UpdateSubjectController::class);
