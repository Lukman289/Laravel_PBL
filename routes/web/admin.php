<?php

use App\Http\Controllers\Admin\PendudukResource;
use App\Http\Controllers\Shared\AuthController;
use App\Http\Controllers\Shared\DashboardController;
use App\Http\Controllers\Shared\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web for admin role
|--------------------------------------------------------------------------
|
| we separate web route for role admin to make web routes in web.php more
| clean and easy to maintain admin route in here
|
*/
Route::group([
    'middleware' => ['auth', 'checkLevel:admin'],
    'prefix' => 'admin'
    ], function () {
        /**
         * routes for dashsboard and profile ketua
         */
        Route::get('/', [DashboardController::class, 'indexAdmin']);
        Route::get('/profile', [ProfileController::class, 'indexAdmin'])->name('admin.profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

        /**
         * routes for data penduduk feature in admin
         */
        Route::resource('penduduk', PendudukResource::class);

        /**
         * route for logout process
         */
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    }
);
