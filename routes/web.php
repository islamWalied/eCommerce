<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get("/", [HomeController::class, "index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/redirect", [HomeController::class, "redirect"])->middleware('auth');

Route::get("/view_category", [AdminController::class, "view_category"]);
Route::post("/add_category", [AdminController::class, "add_category"]);
Route::get("/delete_category/{id}", [AdminController::class, "delete_category"]);

Route::post("/add_product", [AdminController::class, "add_product"]);
Route::get("/view_product", [AdminController::class, "view_product"]);
Route::get("/show_product", [AdminController::class, "show_product"]);
Route::get("/delete_product/{id}", [AdminController::class, "delete_product"]);
Route::get("/edit_product/{id}", [AdminController::class, "edit_product"]);
Route::post("/update_product/{id}", [AdminController::class, "update_product"]);


Route::get("/all_products", [AdminController::class, "all_products"]);
Route::get("/product_details/{id}", [HomeController::class, "product_details"]);
Route::post("/add_cart/{id}", [HomeController::class, "add_cart"]);
Route::get("/show_cart", [HomeController::class, "show_cart"]);
Route::get("/remove_cart/{id}", [HomeController::class, "remove_cart"]);
Route::get("/cash", [HomeController::class, "cash"]);
Route::get("/card/{totalprice}", [HomeController::class, "card"]);

Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');



Route::get("/view_order", [AdminController::class, "view_order"]);
Route::get("/print_pdf/{id}", [AdminController::class, "print_pdf"]);
Route::get("/approve_product/{id}", [AdminController::class, "approve_product"]);
//Route::get("/send_email/{id}", [AdminController::class, "send_email"]);
//Route::post("/send_user_email/{id}", [AdminController::class, "send_user_email"]);
Route::get("/search", [AdminController::class, "search"]);


Route::post("/add_comment", [HomeController::class, "add_comment"]);
Route::post("/add_reply", [HomeController::class, "add_reply"]);
Route::get("/about", [HomeController::class, "about"]);
//Route::get("/testimonial", [HomeController::class, "testimonial"]);



//Route::get("/edit_category/{id}", [AdminController::class, "edit_category"]);
//Route::get("/admin/edit/{id}", [AdminController::class, "edit_category"]);


//Route::controller(CategoryController::class)->group(function () {
//    Route::get('/view_category', 'index');
//    Route::get('/add_category', 'store');
//});



