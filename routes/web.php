<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// main page
Route::get('/', [StudentController::class, 'index']);

// index page
Route::get('/students', [StudentController::class, 'index']);

// add student page or create page
Route::get('/add-students', [StudentController::class, 'create']);

// store or save student
Route::post('/add-students', [StudentController::class, 'store']);

// edit student page with single student data show
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);

// update single student data
Route::put('/update-student/{id}', [StudentController::class, 'update']);
