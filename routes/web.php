<?php

use App\Http\Controllers\Admin\AddAdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\EditProfileController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithoutPassword;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\News\newsletterController;
use App\Http\Controllers\products\AddProductController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\products\profuctDetails;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\FacebookeController;
// use App\Http\Controllers\Auth\GithubAuthController;
// use App\Http\Controllers\Auth\GoogleAuthController;


Route::get('/', [homeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, '__invoke'])->name('register');
    Route::get('/login', [LoginController::class, '__invoke'])->name('login');

    // Google Auth Routes
    // Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('redirect-to-google-login');
    // Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

    // Github Auth Routes
    // Route::get('/auth/github/redirect', [GithubAuthController::class, 'redirect'])->name('redirect-to-github-login');
    // Route::get('/auth/github/callback', [GithubAuthController::class, 'callback']);

    // Facebook Auth Routes
    // Route::get('/auth/facebook/redirect', [FacebookeController::class, 'redirect'])->name('redirect-to-facebook-login');
    // Route::get('/auth/facebook/callback', [FacebookeController::class, 'callback']);

    // Sociale Auth Routes
    Route::get('/auth/{driver}/redirect', [SocialAuthController::class, 'redirect'])->name('social.redirect');
    Route::get('/auth/{driver}/callback', [SocialAuthController::class, 'callback']);

    // Create Account
    Route::post('/create-account', [RegisterController::class, 'create_account'])->name('create_account');
    Route::post('/check-data', [LoginController::class, 'check_data_to_login'])->name('logged_in');

    // Forget Password
    Route::get('forget-password', [ForgetPasswordController::class, '__invoke'])->name('forget_password');

    // Login Without Password
    Route::get('/Login-without-password', [LoginWithoutPassword::class, 'Login_Without_Password'])->name('Login_Without_Password');
    Route::post('/Login-without-password', [LoginWithoutPassword::class, 'send_link'])->name('send_link');
    Route::get('/Login-without-password/{user}', [LoginWithoutPassword::class, 'Login_Without_Password'])->name('Login_handler');

});

Route::middleware('auth')->group(function () {

    Route::post('/subscribe', [newsletterController::class, 'index'])->name('Subscribe');

    // Route For Profile And Data
    Route::prefix('profile')->group(function () {

        Route::get('/', function () {
            return view('Profile');
        })->name('profile');

        Route::get('/logout', [LogoutController::class, '__invoke'])->name('logged_out');

        Route::post('/edit-profile', [EditProfileController::class, '__invoke'])->name('edit_profile');

        Route::get('/update-password', [UpdatePasswordController::class, '__invoke'])->name('update_password');

        Route::post('/confirem-update-password', [UpdatePasswordController::class, 'confirem_update_password'])->name('confirem_update_password');

    });

    Route::get('/user-dashboard', function () {
        return view('Roles.user');
    })->name('user-dashboard')->middleware('role:user');

    Route::prefix('admin-dashboard')->group(function () {

        Route::get('/', [UsersController::class, 'showAdminDashboard'])->name('admin-dashboard')->middleware('role:admin');

        Route::get('/users', [UsersController::class, 'showUsersDashboard'])->name('users')->middleware('role:admin');

        Route::post('/delete-user/{id}', [UsersController::class, 'deleteUser'])->name('user-destroy')->middleware('role:admin');

        Route::post('/update-user-role/{id}', [UsersController::class, 'updateUserRole'])->name('update-user-role')->middleware('role:admin');

        Route::get('/add-admin', [AddAdminController::class, 'showFormAddAdmin'])->name('addAdmin')->middleware('role:admin');

        Route::post('/add-admin', [AddAdminController::class, 'addAdmin'])->name('saveAdmin')->middleware('role:admin');

        Route::get('/sellers', [UsersController::class, 'showSellersDashboard'])->name('sellers')->middleware('role:admin');
    });

    Route::prefix('seller-dashboard')->group(function () {
        Route::get('/', [AddProductController::class, 'show_dashboard'])->name('seller-dashboard')->middleware('role:seller');

        Route::get('/add-product', [AddProductController::class, 'show_add_product_form'])->name('show_add_product_form')->middleware('role:seller');

        Route::post('/add-product', [AddProductController::class, 'add_product'])->name('save-product')->middleware('role:seller');
    });
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/product-details/{id}', [profuctDetails::class, 'index'])->name('product-details');
});