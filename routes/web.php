<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $totalCustomers = Customer::count();
    $totalSales = Sale::count();
    $totalRevenue = Sale::sum('total_price');
    return view('dashboard', compact(
        'totalProducts',
        'totalCustomers',
        'totalSales',
        'totalRevenue'
    ));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
