<?php

use App\Http\Controllers\ProfileController;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    $users = User::all();
    $orders = Order::all();
    $products = Product::all();

    // Revenue calculation (completed orders only)
    $revenue = $orders->where('status', 'completed')->sum('price');

    // Count of active users
    $activeUsers = $users->where('status', 'active')->count();

    // Count of cancelled orders
    $cancelledOrders = $orders->where('status', 'cancelled')->count();

    // Count of pending orders
    $pendingOrders = $orders->where('status', 'pending')->count();

    // User without address
    $usersWithoutAddress = $users->whereNull('address')->count();

    // Most paying user (User with the highest total spent)
    $mostPayingUser = $users->map(function ($user) use ($orders) {
        $totalSpent = $orders->where('user_id', $user->id)->where('status', 'completed')->sum('price');
        return ['user' => $user, 'totalSpent' => $totalSpent];
    })->sortByDesc('totalSpent')->first();

    // Most ordered product
    $mostOrderedProduct = $products->map(function ($product) use ($orders) {
        $orderedCount = $orders->where('product_id', $product->id)->count();
        return ['product' => $product, 'orderedCount' => $orderedCount];
    })->sortByDesc('orderedCount')->first();

    // Most sold product (Completed orders)
    $mostSoldProduct = $products->map(function ($product) use ($orders) {
        $soldCount = $orders->where('product_id', $product->id)->where('status', 'completed')->count();
        return ['product' => $product, 'soldCount' => $soldCount];
    })->sortByDesc('soldCount')->first();

    return view('admin.index', compact(
        'users', 'orders', 'products', 'revenue', 'activeUsers', 'cancelledOrders', 
        'pendingOrders', 'usersWithoutAddress', 'mostPayingUser', 'mostOrderedProduct', 'mostSoldProduct'
    ));})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('permission',ProfileController::class);

require __DIR__.'/auth.php';
