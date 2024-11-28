<?php

/**
 * member route file
 * member login route defined at web.php file
 * 
 */

use App\Livewire\Member\Dashboard\Dashboard as memberDashboard;
use App\Livewire\Member\Exams\Index as archieveExamIndex;
use App\Livewire\Member\Live\LiveExamIndex;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/**
 * after login, member will redirect to this route 
 * based on their role and permission
 */
// student dashboard
// Route::get('/showLiveExam', function () {})->name("showLiveExam");

Route::prefix("/student/panel")->middleware(['auth', 'role:member'])->group(function () {

    /**
     * @return member deshboard livewire class
     */
    Route::get('/', memberDashboard::class)->name("student-dashboard");


    /**
     * live index page route
     * @return live exam livewire page
     * /livewire/member/live/liveExamIndex
     */
    Route::get('/exams/lives/now', LiveExamIndex::class)->name("memberExam.live");

    /**
     * archieve exam index
     * @return /member/exams/index as archieve exam page
     */
    Route::get('/archieve/exams', archieveExamIndex::class)->name('memberArchieveExams.index');
});
