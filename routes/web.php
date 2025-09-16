<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Mama\MamaController;
use App\Http\Controllers\Mama\ChildController;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Mama\VaccinationController;
use App\Http\Controllers\Mama\GrowthMonitoringController;
use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Doctor\ChatController;
use App\Http\Controllers\Mama\ReminderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\NGOController;

Route::get('/', function () {
    return view('welcome');
});

// Routes accessible kwa kila user aliye logged in
Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function(){
        $user = auth()->user();
        // unaweza bado ku-display dashboard tofauti kulingana na role
        if($user->hasRole('Admin')){
            return view('dashboard.admin');
        } elseif($user->hasRole('Doctor')){
            return view('dashboard.doctor');
        } elseif($user->hasRole('Pregnant Woman')){
            return view('dashboard.pregnant');
        } elseif($user->hasRole('Breastfeeding Woman')){
            return view('dashboard.breastfeeding');
        } elseif($user->hasRole('Visitor')){
            return view('dashboard.visitor');
        } elseif($user->hasRole('NGO')){
            return view('dashboard.ngo');
        }
    })->name('dashboard');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Permissions
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // Mamas
    Route::get('mamas', [MamaController::class, 'index'])->name('mamas.index');
    Route::get('mamas/create', [MamaController::class, 'create'])->name('mamas.create');
    Route::post('mamas', [MamaController::class, 'store'])->name('mamas.store');
    Route::get('mamas/{mama}', [MamaController::class, 'show'])->name('mamas.show');
    Route::get('mamas/{mama}/edit', [MamaController::class, 'edit'])->name('mamas.edit');
    Route::put('mamas/{mama}', [MamaController::class, 'update'])->name('mamas.update');
    Route::delete('mamas/{mama}', [MamaController::class, 'destroy'])->name('mamas.destroy');
    //Kuonesha details zake
      Route::get('/mama/profile', [MamaController::class, 'profile'])->name('mamas.profile');
      //Kuonesha Vaccine za mtoto wake
       Route::get('/mama/vaccinations', [VaccinationController::class, 'indexForMama'])->name('mama.vaccinations');

    // Children
    Route::get('children', [ChildController::class, 'index'])->name('children.index');
    Route::get('children/create', [ChildController::class, 'create'])->name('children.create');
    Route::post('children', [ChildController::class, 'store'])->name('children.store');
    Route::get('children/{child}', [ChildController::class, 'show'])->name('children.show');
    Route::get('children/{child}/edit', [ChildController::class, 'edit'])->name('children.edit');
    Route::put('children/{child}', [ChildController::class, 'update'])->name('children.update');
    Route::delete('children/{child}', [ChildController::class, 'destroy'])->name('children.destroy');

    // Appointments
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    //appintments
    Route::put('appointments/{appointment}/feedback', [AppointmentController::class, 'feedback'])->name('appointments.feedback');


    // Vaccinations
    Route::get('vaccinations', [VaccinationController::class, 'index'])->name('vaccinations.index');
    Route::get('vaccinations/create', [VaccinationController::class, 'create'])->name('vaccinations.create');
    Route::post('vaccinations', [VaccinationController::class, 'store'])->name('vaccinations.store');
    Route::get('vaccinations/{vaccination}', [VaccinationController::class, 'show'])->name('vaccinations.show');
    Route::get('vaccinations/{vaccination}/edit', [VaccinationController::class, 'edit'])->name('vaccinations.edit');
    Route::put('vaccinations/{vaccination}', [VaccinationController::class, 'update'])->name('vaccinations.update');
    Route::delete('vaccinations/{vaccination}', [VaccinationController::class, 'destroy'])->name('vaccinations.destroy');

    // Growth Monitoring
    Route::get('growth-monitorings', [GrowthMonitoringController::class, 'index'])->name('growth-monitorings.index');
    Route::get('growth-monitorings/create', [GrowthMonitoringController::class, 'create'])->name('growth-monitorings.create');
    Route::post('growth-monitorings', [GrowthMonitoringController::class, 'store'])->name('growth-monitorings.store');
    Route::get('growth-monitorings/{growthMonitoring}', [GrowthMonitoringController::class, 'show'])->name('growth-monitorings.show');
    Route::get('growth-monitorings/{growthMonitoring}/edit', [GrowthMonitoringController::class, 'edit'])->name('growth-monitorings.edit');
    Route::put('growth-monitorings/{growthMonitoring}', [GrowthMonitoringController::class, 'update'])->name('growth-monitorings.update');
    Route::delete('growth-monitorings/{growthMonitoring}', [GrowthMonitoringController::class, 'destroy'])->name('growth-monitorings.destroy');

    // Announcements
    Route::get('announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
    Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

    // Reminders
    Route::get('reminders', [ReminderController::class, 'index'])->name('reminders.index');
    Route::get('reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
    Route::post('reminders', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('reminders/{reminder}', [ReminderController::class, 'show'])->name('reminders.show');
    Route::get('reminders/{reminder}/edit', [ReminderController::class, 'edit'])->name('reminders.edit');
    Route::put('reminders/{reminder}', [ReminderController::class, 'update'])->name('reminders.update');
    Route::delete('reminders/{reminder}', [ReminderController::class, 'destroy'])->name('reminders.destroy');
    Route::get('reminders/my', [ReminderController::class, 'myReminders'])->name('reminders.my');


  // List of users to start chat
Route::get('chats', [ChatController::class, 'index'])->name('chats.list');

// Open chat with specific receiver
Route::get('chats/{receiver}', [ChatController::class, 'index'])->name('chats.index');

Route::post('chats', [ChatController::class, 'store'])->name('chats.store');


   
    Route::get('visitor/dashboard', [VisitorController::class, 'dashboard'])->name('visitor.dashboard');
    Route::get('visitor/relatives', [VisitorController::class, 'relatives'])->name('visitor.relatives');





    // NGO reports
    Route::get('ngo/reports', [NGOController::class, 'reports'])->name('ngo.reports');
});




// routes/web.php
    Route::get('/my-children', [ChildController::class, 'myChildren'])
        ->name('children.my');



    Route::get('/mama/announcements', [AnnouncementController::class, 'mamaIndex'])
        ->name('mama.announcements');
require __DIR__.'/auth.php';
