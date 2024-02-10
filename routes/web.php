<?php

use App\Http\Controllers\admin\BuildingController;
use App\Http\Controllers\admin\ButtonController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DeviceController;
use App\Http\Controllers\admin\DisplayController;
use App\Http\Controllers\admin\EquipmentController;
use App\Http\Controllers\admin\EvaluateController;
use App\Http\Controllers\admin\GetDataController;
use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\LineController;
use App\Http\Controllers\admin\ProcessController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\ZonaController;
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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/', function () {return redirect('dashboard');})->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/display', [DashboardController::class, 'display'])->middleware('auth')->name('display');
Route::get('/display_zone', [DashboardController::class, 'display_zone'])->middleware('auth')->name('display_zone');
Route::get('/display_machine_call', [DashboardController::class, 'display_machine_call'])->middleware('auth')->name('display_machine_call');
Route::get('/display_quality_call', [DashboardController::class, 'display_quality_call'])->middleware('auth')->name('display_quality_call');
Route::get('/display_material_call', [DashboardController::class, 'display_material_call'])->middleware('auth')->name('display_material_call');
Route::get('/display_spv_call', [DashboardController::class, 'display_spv_call'])->middleware('auth')->name('display_spv_call');
Route::get('/display_progress', [DashboardController::class, 'display_progress'])->middleware('auth')->name('display_progress');
Route::get('/user_page', [DashboardController::class, 'user_page'])->middleware('auth')->name('user_page');
Route::get('/user_performance', [DashboardController::class, 'user_performance'])->middleware('auth')->name('user_performance');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');

Route::controller(DisplayController::class)->group(function () {
    Route::get('display', 'index')->name('display.index');
    Route::get('display/show', 'displayShow')->name('display.show');
});


Route::group(['middleware' => 'auth'], function () {

	// Route::get('billing', function () {
	// 	return view('pages.billing');
	// })->name('billing');
	// Route::get('tables', function () {
	// 	return view('pages.tables');
	// })->name('tables');
	// Route::get('rtl', function () {
	// 	return view('pages.rtl');
	// })->name('rtl');
	// Route::get('virtual-reality', function () {
	// 	return view('pages.virtual-reality');
	// })->name('virtual-reality');
	// Route::get('notifications', function () {
	// 	return view('pages.notifications');
	// })->name('notifications');
	// Route::get('static-sign-in', function () {
	// 	return view('pages.static-sign-in');
	// })->name('static-sign-in');
	// Route::get('static-sign-up', function () {
	// 	return view('pages.static-sign-up');
	// })->name('static-sign-up');

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('user-profile', 'index')->name('user-profile');
        Route::put('user-profile/update/photo', 'updatePhoto')->name('update.photo-profile');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('transaction', 'index')->name('transaction.index');
        Route::post('transaction/search', 'search')->name('transaction.search');
        Route::get('transaction-standby', 'standby')->name('transaction.standby');
        Route::get('transaction-call', 'status_call')->name('transaction.status.call');
        Route::get('transaction-response', 'status_response')->name('transaction.status.response');
        Route::get('transaction-pending', 'status_pending')->name('transaction.status.pending');

        Route::post('transaction', 'store')->name('transaction.store');
        Route::post('transaction/response', 'response')->name('transaction.response');
        Route::post('transaction/closed', 'closed')->name('transaction.closed');
        Route::get('transaction/excel', 'excel')->name('transaction.excel');
        Route::get('transaction/filter', 'filter')->name('transaction.filter');
        Route::get('transaction/{id}/detail-response', 'detail_response')->name('transaction.detail.response');
    });

    Route::controller(EvaluateController::class)->group(function () {
        Route::get('evaluate', 'index')->name('evaluate.index');
        Route::get('evaluate/filter', 'filter')->name('evaluate.filter');
    });

    Route::controller(UserManagementController::class)->group(function () {
        Route::get('user-management', 'index')->name('user-management');
        Route::post('user-management', 'store')->name('user-management.store')->middleware('isAdd');
        Route::get('user-management/{id}/edit', 'edit')->name('user-management.edit');
        Route::put('user-management', 'update')->name('user-management.update')->middleware('isUpdate');
    });

    Route::controller(RolesController::class)->group(function () {
        Route::get('roles', 'index')->name('roles.index');
        Route::post('roles', 'store')->name('roles.store')->middleware('isAdd');
        Route::put('roles', 'update')->name('roles.update')->middleware('isUpdate');
        Route::delete('roles', 'destroy')->name('roles.delete')->middleware('isDelete');
    });

    Route::controller(DepartmentController::class)->group(function () {
        Route::get('department', 'index')->name('department.index');
        Route::post('department', 'store')->name('department.store')->middleware('isAdd');
        Route::put('department', 'update')->name('department.update')->middleware('isUpdate');
        Route::delete('department', 'destroy')->name('department.delete')->middleware('isDelete');
    });

    Route::controller(SectionController::class)->group(function () {
        Route::get('section', 'index')->name('section.index');
        Route::post('section', 'store')->name('section.store')->middleware('isAdd');
        Route::get('section/{id}/edit', 'edit')->name('section.edit');
        Route::put('section', 'update')->name('section.update')->middleware('isUpdate');
        Route::delete('section', 'destroy')->name('section.delete')->middleware('isDelete');
    });

    Route::controller(JabatanController::class)->group(function () {
        Route::get('jabatan', 'index')->name('jabatan.index');
        Route::post('jabatan', 'store')->name('jabatan.store')->middleware('isAdd');
        Route::put('jabatan', 'update')->name('jabatan.update')->middleware('isUpdate');
        Route::delete('jabatan', 'destroy')->name('jabatan.delete')->middleware('isDelete');
    });

    Route::controller(CompanyController::class)->group(function () {
        Route::get('company', 'index')->name('company.index');
        Route::post('company', 'store')->name('company.store')->middleware('isAdd');
        Route::put('company', 'update')->name('company.update')->middleware('isUpdate');
        Route::delete('company', 'destroy')->name('company.delete')->middleware('isDelete');
    });

    Route::controller(BuildingController::class)->group(function () {
        Route::get('building', 'index')->name('building.index');
        Route::post('building', 'store')->name('building.store')->middleware('isAdd');
        Route::put('building', 'update')->name('building.update')->middleware('isUpdate');
        Route::delete('building', 'destroy')->name('building.delete')->middleware('isDelete');
    });

    Route::controller(EquipmentController::class)->group(function () {
        Route::get('equipment', 'index')->name('equipment.index');
        Route::post('equipment', 'store')->name('equipment.store')->middleware('isAdd');
        Route::get('equipment/{id}/edit', 'edit')->name('equipment.edit');
        Route::put('equipment', 'update')->name('equipment.update')->middleware('isUpdate');
        Route::delete('equipment', 'destroy')->name('equipment.delete')->middleware('isDelete');
    });

    Route::controller(ZonaController::class)->group(function () {
        Route::get('zona', 'index')->name('zona.index');
        Route::post('zona', 'store')->name('zona.store')->middleware('isAdd');
        Route::put('zona', 'update')->name('zona.update')->middleware('isUpdate');
        Route::delete('zona', 'destroy')->name('zona.delete')->middleware('isDelete');
    });

    Route::controller(LineController::class)->group(function () {
        Route::get('line', 'index')->name('line.index');
        Route::post('line', 'store')->name('line.store')->middleware('isAdd');
        Route::put('line', 'update')->name('line.update')->middleware('isUpdate');
        Route::delete('line', 'destroy')->name('line.delete')->middleware('isDelete');
    });

    Route::controller(ProcessController::class)->group(function () {
        Route::get('process', 'index')->name('process.index');
        Route::post('process', 'store')->name('process.store')->middleware('isAdd');
        Route::put('process', 'update')->name('process.update')->middleware('isUpdate');
        Route::delete('process', 'destroy')->name('process.delete')->middleware('isDelete');
    });

    Route::controller(DeviceController::class)->group(function () {
        Route::get('devices', 'index')->name('device.index');
        Route::post('devices', 'store')->name('device.store')->middleware('isAdd');
        Route::get('devices/{id}/edit', 'edit')->name('device.edit');
        Route::put('devices', 'update')->name('device.update')->middleware('isUpdate');
        Route::delete('devices', 'destroy')->name('device.delete')->middleware('isDelete');
    });

    Route::controller(ButtonController::class)->group(function () {
        Route::get('buttons', 'index')->name('button.index');
        Route::get('buttons/add', 'create')->name('button.create');
        Route::post('buttons', 'store')->name('button.store')->middleware('isAdd');
        Route::get('buttons/{id}/edit', 'edit')->name('button.edit');
        Route::put('buttons', 'update')->name('button.update')->middleware('isUpdate');
        Route::delete('buttons', 'destroy')->name('button.delete')->middleware('isDelete');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('settings', 'index')->name('settings.index');
        Route::post('settings', 'store')->name('settings.store');
        Route::put('settings', 'update')->name('settings.update');
        Route::delete('settings', 'destroy')->name('settings.delete');
    });

    Route::controller(GetDataController::class)->group(function () {
        Route::get('getAudio', 'getAudio');
    });
});
