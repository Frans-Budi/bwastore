<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ProductGalleryController as AdminProductGalleryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CheckoutController;

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

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get("/categories", [CategoryController::class, "index"])->name(
    "categories"
);
Route::get("/categories/{id}", [CategoryController::class, "detail"])->name(
    "categories-detail"
);

Route::post("/details/{id}", [DetailController::class, "add"])->name(
    "detail-add"
);

Route::post("/checkout", [CheckoutController::class, "process"])->name(
    "checkout"
);
Route::post("/checkout/callback", [
    CheckoutController::class,
    "callback",
])->name("midtrans-callback");

Route::get("/success", [CartController::class, "success"])->name("success");

Route::get("/register/success", [
    RegisteredUserController::class,
    "success",
])->name("register-success");

Route::group(["middleware" => ["auth"]], function () {
    Route::get("/cart", [CartController::class, "index"])->name("cart");
    Route::delete("/cart/{id}", [CartController::class, "delete"])->name(
        "cart-delete"
    );

    Route::get("/details/{id}", [DetailController::class, "index"])->name(
        "detail"
    );

    // Dashboard | Index
    Route::get("/dashboard", [DashboardController::class, "index"])->name(
        "dashboard"
    );

    // Dashboard / Products | Index
    Route::get("/dashboard/products", [
        DashboardProductController::class,
        "index",
    ])->name("dashboard-products");
    // Dashboard / Products / Create | create
    Route::get("/dashboard/products/create", [
        DashboardProductController::class,
        "create",
    ])->name("dashboard-products-create");
    // Dashboard / Products | store
    Route::post("/dashboard/products", [
        DashboardProductController::class,
        "store",
    ])->name("dashboard-products-store");
    // Dashboard / Products / {id} | detail
    Route::get("/dashboard/products/{id}", [
        DashboardProductController::class,
        "details",
    ])->name("dashboard-products-details");
    // Dashboard / Products / {id} | update
    Route::post("/dashboard/products/{id}", [
        DashboardProductController::class,
        "update",
    ])->name("dashboard-products-update");

    // Dashboard / Products / {id} | uploadGallery
    Route::post("/dashboard/products/gallery/upload", [
        DashboardProductController::class,
        "uploadGallery",
    ])->name("dashboard-products-gallery-upload");
    // Dashboard / Products / {id} | deleteGallery
    Route::get("/dashboard/products/gallery/delete/{id}", [
        DashboardProductController::class,
        "deleteGallery",
    ])->name("dashboard-products-gallery-delete");

    // Dashboard / Transaction | Index
    Route::get("/dashboard/transactions", [
        DashboardTransactionController::class,
        "index",
    ])->name("dashboard-transaction");
    // Dashboard / Transaction / {id} | details
    Route::get("/dashboard/transactions/{id}", [
        DashboardTransactionController::class,
        "details",
    ])->name("dashboard-transaction-details");
    // Dashboard / Transaction / {id} | update
    Route::post("/dashboard/transactions/{id}", [
        DashboardTransactionController::class,
        "update",
    ])->name("dashboard-transaction-update");

    // Dashboard / Settings | store
    Route::get("/dashboard/settings", [
        DashboardSettingController::class,
        "store",
    ])->name("dashboard-settings-store");
    // Dashboard / Settings | account
    Route::get("/dashboard/account", [
        DashboardSettingController::class,
        "account",
    ])->name("dashboard-settings-account");
    // Dashboard / Settings / {redirect} | update
    Route::post("/dashboard/account/{redirect}", [
        DashboardSettingController::class,
        "update",
    ])->name("dashboard-settings-redirect");
});

// ->middleware(["auth", "admin"])
Route::prefix("admin")
    ->middleware(["auth", "admin"])
    ->group(function () {
        Route::get("/", [AdminDashboardController::class, "index"])->name(
            "admin-dashboard"
        );
        Route::resource("category", AdminCategoryController::class);
        Route::resource("user", AdminUserController::class);
        Route::resource("product", AdminProductController::class);
        Route::resource("product", AdminProductController::class);
        Route::resource(
            "product-gallery",
            AdminProductGalleryController::class
        );
    });

// Route::get("/dashboard", function () {
//     return view("dashboard");
// })
//     ->middleware(["auth", "verified"])
//     ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

require __DIR__ . "/auth.php";
