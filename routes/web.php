<?php

use App\Http\Controllers\admin\BuildingController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DeviceController;
use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\SectionController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/display', [DashboardController::class, 'display'])->middleware('auth')->name('display');
Route::get('/display_zone', [DashboardController::class, 'display_zone'])->middleware('auth')->name('display_zone');
Route::get('/display_zone_if_report', [DashboardController::class, 'display_zone_if_report'])->middleware('auth')->name('display_zone_if_report');
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

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('user-profile', 'index')->name('user-profile');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('transaction', 'index')->name('transaction.index');
        Route::post('transaction', 'store')->name('transaction.store');
        Route::post('transaction/response', 'response')->name('transaction.response');
        Route::post('transaction/closed', 'closed')->name('transaction.closed');
        Route::get('transaction/excel', 'excel')->name('transaction.excel');
    });

    Route::controller(UserManagementController::class)->group(function () {
        Route::get('user-management', 'index')->name('user-management');
        Route::post('user-management', 'store')->name('user-management.store');
    });

    Route::controller(RolesController::class)->group(function () {
        Route::get('roles', 'index')->name('roles.index');
        Route::post('roles', 'store')->name('roles.store');
    });

    Route::controller(DepartmentController::class)->group(function () {
        Route::get('department', 'index')->name('department.index');
        Route::post('department', 'store')->name('department.store');
    });

    Route::controller(SectionController::class)->group(function () {
        Route::get('section', 'index')->name('section.index');
        Route::post('section', 'store')->name('section.store');
    });

    Route::controller(JabatanController::class)->group(function () {
        Route::get('jabatan', 'index')->name('jabatan.index');
        Route::post('jabatan', 'store')->name('jabatan.store');
    });

    Route::controller(CompanyController::class)->group(function () {
        Route::get('company', 'index')->name('company.index');
        Route::post('company', 'store')->name('company.store');
    });

    Route::controller(BuildingController::class)->group(function () {
        Route::get('building', 'index')->name('building.index');
        Route::post('building', 'store')->name('building.store');
    });

    Route::controller(ZonaController::class)->group(function () {
        Route::get('zona', 'index')->name('zona.index');
        Route::post('zona', 'store')->name('zona.store');
    });

    Route::controller(DeviceController::class)->group(function () {
        Route::get('device', 'index')->name('device.index');
        Route::post('device', 'store')->name('device.store');
    });
});
