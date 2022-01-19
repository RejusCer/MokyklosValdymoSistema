<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

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

Route::get('/login', [LoginController::class, 'view'])->name('auth.login');
Route::post('/login', [LoginController::class, 'loginUser']);

Route::group(['middleware' => ['LoggedIn']], function() {
    Route::post('/logout', [LoginController::class, 'logoutUser'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::group([
        'middleware' => ['is_admin'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function(){

        Route::get('/home', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('home');
    
        //students
        Route::get('students/student_search', [App\Http\Controllers\admin\StudentsController::class, 'search']);
        Route::resource('students', App\Http\Controllers\admin\StudentsController::class)->except(['show']);
    
        // teachers
        Route::resource('teachers', App\Http\Controllers\admin\TeachersController::class)->except(['show']);
    
        // lessons
        Route::resource('lessons', App\Http\Controllers\admin\LessonsController::class)->except(['show']);
    
        // classes
        Route::resource('classes', App\Http\Controllers\admin\ClassesController::class)->except(['show']);
    
        // comments
        Route::resource('comments', App\Http\Controllers\admin\CommentsController::class)->except(['show']);

        // grades
        Route::get('/grades', [App\Http\Controllers\admin\GradesController::class, 'index'])->name('grades');
    });

    Route::group([
        'middleware' => ['is_teacher'],
        'prefix' => 'teacher',
        'as' => 'teacher.'
    ], function(){
        
        Route::get('/home', [App\Http\Controllers\teacher\HomeController::class, 'index'])->name('home');

        // lessons
        Route::get('/lessons', [App\Http\Controllers\teacher\LessonsController::class, 'index'])->name('lessons.index');
    
        Route::get('/lessons/view/{lesson}', [App\Http\Controllers\teacher\LessonsController::class, 'viewStudents'])->name('lessons.view');
    
        // classes
        Route::get('/classes', [App\Http\Controllers\teacher\ClassesController::class, 'index'])->name('classes.index');
    
        // comments
        Route::get('/comments', [App\Http\Controllers\teacher\CommentsController::class, 'index'])->name('comments.index');
        Route::delete('/comments/delete/{comment}', [App\Http\Controllers\teacher\CommentsController::class, 'destroy'])->name('comments.destroy');
    
        Route::get('/comments/create/', [App\Http\Controllers\teacher\CommentsController::class, 'storeView'])->name('comments.create');
        Route::post('/comments/create/', [App\Http\Controllers\teacher\CommentsController::class, 'store']);
    
        Route::get('/comments/update/{comment}', [App\Http\Controllers\teacher\CommentsController::class, 'updateView'])->name('comments.update');
        Route::post('/comments/update/{comment}', [App\Http\Controllers\teacher\CommentsController::class, 'update']);
    
        // grades
        Route::get('/grades/{lesson}/{student}', [App\Http\Controllers\teacher\GradesController::class, 'index'])->name('grades');
        Route::post('/grades/{lesson}/{student}', [App\Http\Controllers\teacher\GradesController::class, 'add']);

        Route::delete('/grades/delete/{grade}', [App\Http\Controllers\teacher\GradesController::class, 'destroy'])->name('grades.destroy');
    });

    Route::group([
        'middleware' => ['is_student'],
        'prefix' => 'student',
        'as' => 'student.'
    ], function(){

        Route::get('/home', [App\Http\Controllers\student\HomeController::class, 'index'])->name('home');

        // comments
        Route::get('/comments', [App\Http\Controllers\student\CommentsController::class, 'index'])->name('comments.index');

        Route::get('/comments/create', [App\Http\Controllers\student\CommentsController::class, 'storeView'])->name('comments.create');
        Route::post('/comments/create', [App\Http\Controllers\student\CommentsController::class, 'store']);

        // lessons
        Route::get('/lessons', [App\Http\Controllers\student\LessonsController::class, 'index'])->name('lessons.index');

        // grades
        Route::get('/grades/{lesson}', [App\Http\Controllers\student\GradesController::class, 'index'])->name('grades');
    });

    
});
