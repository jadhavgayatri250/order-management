
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('customer.dashboard');

})->middleware('auth')->name('dashboard');



Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/pending-orders', [AdminDashboardController::class, 'pendingOrders'])
            ->name('pending-orders');

        Route::get('/delivered-orders', [AdminDashboardController::class, 'deliveredOrders'])
            ->name('delivered-orders');

        Route::get('/reports', [AdminDashboardController::class, 'reports'])
            ->name('reports');

        Route::resource('customers', CustomerController::class);

        Route::resource('orders', OrderController::class);

        Route::resource('order-items', OrderItemController::class);

    });


Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    Route::resource('orders', OrderController::class);

    Route::resource('order-items', OrderItemController::class);

});



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';
