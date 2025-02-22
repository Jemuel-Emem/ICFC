<?php
use App\Http\Controllers\auth;
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

Route::view('/', 'welcome');
Route::middleware([

    ])->group(function () {
         Route::get('/dashboard', function () {
           if (auth()->user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
           }else{
            return redirect()->route('user-dashboard');
           }
         })->name('userdashboard');

    });

    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::get('/Admindashboard', function(){
            return view('admin.index');
        })->name('Admindashboard');

        Route::get('/admin.weddings', function(){
            return view('admin.weddings');
        })->name('admin.weddings');

        Route::get('/admin.baptism', function(){
            return view('admin.baptism');
        })->name('admin.baptism');

        Route::get('/admin.funeral', function(){
            return view('admin.funeral');
        })->name('admin.funeral');

        Route::get('/admin.certificate', function(){
            return view('admin.certificate');
        })->name('admin.certificate');

        Route::get('/admin.donations', function(){
            return view('admin.donations');
        })->name('admin.donations');

        Route::get('/admin.donation-list', function(){
            return view('admin.donations-list');
        })->name('admin.donation-list');

        Route::get('/admin.updates', function(){
            return view('admin.updates');
        })->name('admin.updates');

     });

     Route::prefix('user')->middleware('user')->group(function(){
        Route::get('/dashboard', function(){
               return view('user.index');
           })->name('user-dashboard');

           Route::get('/user.services', function(){
            return view('user.services');
        })->name('user-services');

        Route::get('/user.wedding', function(){
            return view('user.wedding');
        })->name('user-wedding');

        Route::get('/user.baptism', function(){
            return view('user.baptism');
        })->name('user-baptism');

        Route::get('/user.funeral', function(){
            return view('user.funeral');
        })->name('user-funeral');


        Route::get('/user.status', function(){
            return view('user.appointment_status');
        })->name('user-status');




    });
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/logout', [auth::class, 'logout'])->name('logout');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
