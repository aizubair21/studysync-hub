<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\admin\adminController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Role\PermissionIndex;
use App\Livewire\Admin\Role\RoleIndex;
use App\Livewire\Admin\Role\EditPermissionForm;
use App\Livewire\Admin\User\Index;
use App\Livewire\Admin\User\VendorForm;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Vendor\Dashboard as VendorDashboard;
use App\Livewire\Vendor\ExamsSchedule\ScheduleEdit;
use App\Livewire\Vendor\ExamsSchedule\ScheduleIndex;
use App\Livewire\Vendor\ExamsSchedule\ScheduleForm;
use App\Livewire\Vendor\Group\Groupcreate;
use App\Livewire\Vendor\Group\GroupIndex;
use App\Livewire\Vendor\Group\GroupUpdate;
use App\Livewire\Vendor\Member\MemberCreateForm;
use App\Livewire\Vendor\Member\MemberIndex;
use App\Livewire\Vendor\Supervisor\SupervisorCreateForm;
use App\Livewire\Vendor\Supervisor\SupervisorIndex;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return redirect()->route('login');
});

//get login
Route::get("/login", Login::class)->name("login");
Route::get("/regiser", Register::class)->name("register");


// Route::get("assign-admin-role", function () {
//     $user = User::find(11);
//     // Check if user has admin role
//     $user->assignRole("admin");
//     return back();
// })->name('attached-role-to-user');


// require __DIR__ . '/auth.php';
// dashboard route can access anyone, but to do anything permission must be needed 
Route::get("/dashboard", function () {
    // dd($roles = Auth()->user()->hasRole("admin"));
    // if role has instructor, return to instructor dashboard
    if (Auth()->user()->hasRole("instructor")) {
        return redirect()->route("instructor-dashboard");
    } elseif (Auth()->user()->hasRole("student")) {
        return redirect()->route("student-dashboard");
    } elseif (Auth()->user()->hasRole("parent")) {
        return redirect()->route("parent-dashboard");
    } elseif (Auth()->user()->hasRole("admin")) {
        return redirect()->route('administrator-dashboard');
    }
})->name('dashboard')->middleware("auth");
// dd(Auth::id());

// student dashboard
Route::get('/student/panel', function () {
    return view("auth.student.index");
})->name("student-dashboard")->middleware(["auth", "role:student"]);

//parent dashboard
Route::get("parent/section", function () {
    return view("auth.parent.index");
})->name("parent-dashboard")->middleware(["auth", "role:parent"]);


//admin routes
Route::prefix("administrator")->middleware(["auth", "role:admin"])->group(function () {

    //admin dashboard
    Route::get("dashboard", Dashboard::class)->name("administrator-dashboard")->middleware(["auth", "role:admin"]);

    //view all user
    Route::get('/vendor/controls', Index::class)->name('adminVandor.index');
    //add new user form
    Route::get('/vendor/create', VendorForm::class)->name('adminVandor.create');
    //store user
    // Route::post('admin/user/store', [adminController::class, 'vendorStore'])->name('adminVendor.store');
    //show user for edit
    Route::get('/vendor/{id}/edit', [adminController::class, "vendorEdit"])->name('adminVendor.edit');
    //update user info
    Route::post('/vendor/update', [adminController::class, "updateStudentInfo"])->name('aminUser.update');
    //delete user
    Route::get('/vendor/{id}/delete', [adminController::class, "deleteStudent"])->name('adminUser.delete');


    //teacher control in admin area
    Route::get('/teacher/view', [adminController::class, 'teacherIndex'])->name('adminTeacher.index');
    Route::get('/teacher/{id}/edit', [adminController::class, 'teacherEdit'])->name('adminTeacher.edit');
    Route::post('/teacher/update', [adminController::class, 'teacherUpdate'])->name('adminTeacher.update');

    // role manage for administrator only 
    Route::get("/member-manage/roles", RoleIndex::class)->name("adminRole.index");
    Route::get("/member-manage/permission", PermissionIndex::class)->name("adminPermission.index");
    Route::get("/member-manage/role/{id}/edit", EditPermissionForm::class)->name("adminRole.edit");
});


//route assign with permission. to access bellow route user must be neede to loged in. then targeted permissio to to task
Route::prefix("/vendor/section")->middleware("auth")->group(function () { // we defile route prefix

    // vendor dashboard
    Route::get("/", VendorDashboard::class)->middleware(["auth", 'role:instructor'])->name("instructor-dashboard");

    //is route is authorized for group task
    Route::get("/group/create", Groupcreate::class)->name('vendorGroup.create');
    Route::get("/groups/manage-groups", GroupIndex::class)->name('vendorGroup.index');
    Route::get("/groups/udpate-gorups/{id}", GroupUpdate::class)->name('vendorGroup.edit');


    //is route authorized for member task
    Route::get("/member/member-list", MemberIndex::class)->name("vendorMember.index");
    Route::get("/member/update-member/{id}", MemberIndex::class)->name("vendorMember.edit");
    Route::get("/member/create", MemberCreateForm::class)->name("vendorMember.create");


    //is route authorize for supervisor task
    Route::get("/supervisor/supervisor-lists", SupervisorIndex::class)->name("vendorSupervisor.index");
    Route::get("/supervisor/create", SupervisorCreateForm::class)->name("vendorSupervisor.create");
    Route::get("/supervisor/update-supervisor/{id}", SupervisorIndex::class)->name("vendorSupervisor.edit");


    //is route authorized for scheduling exams
    Route::get("/exam/index", ScheduleIndex::class)->name("vendorExamSchedule.index");
    Route::get("/exam/create", ScheduleForm::class)->name("vendorExamSchedule.create");
    Route::post("/exam/{id}/edit", ScheduleEdit::class)->name("vendorExamSchedule.edit");

    Route::middleware("can:create_group")->group(function () {
    });

    // Route::middleware(['auth', 'verified', 'can:accessInstructorPanel'])->group(function () {
});
