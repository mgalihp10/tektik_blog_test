<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\General\{
    AuthController,
};
use App\Http\Controllers\Backend\Dashboards\{
    DashboardController,
};
use App\Http\Controllers\Backend\Blogs\{
    BlogController,
};

use App\Http\Controllers\Frontend\General\{
    HomeController,
    ArticleController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function ($router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->get('article/{id}', [ArticleController::class, 'index'])->name('article');
    $router->get('login', [AuthController::class, 'loginFrontend'])->name('login_user');
    $router->post('check_login', [AuthController::class, 'loginClient'])->name('check_login');
    $router->get('register', [AuthController::class, 'regisFrontend'])->name('register_user');
    $router->post('store_register', [AuthController::class, 'saveRegisterUser'])->name('store_register_user');
    $router->post('comments/store', [ArticleController::class, 'makeComments'])->name('store_comment');
    $router->post('comments/updates/{idComment}', [ArticleController::class, 'update'])->name('update_comments');
    $router->get('comments/deletes/{idComment}', [ArticleController::class, 'destroy'])->name('delete_comments');
});

Route::prefix('backend')->group(function ($router) {
    $router->get('login', [AuthController::class, 'loginBackend'])->name('admin_login');
    $router->get('register', [AuthController::class, 'registerBackend'])->name('admin_register');
    $router->post('save_register', [AuthController::class, 'saveRegister'])->name('admin_save_register');
    $router->post('login_admin', [AuthController::class, 'loginAdmin'])->name('admin_login_admin');

    Route::middleware(['auth'])->group(function ($router) {
        $router->get('logout', [AuthController::class, 'logoutAdmin'])->name('admin_logout');
        $router->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        $router->prefix('blog')->group(function ($app) {
            $app->get('index', [BlogController::class, 'index'])->name('blog_index');
            $app->get('add', [BlogController::class, 'add'])->name('blog_add');
            $app->get('edit/{id}', [BlogController::class, 'edit'])->name('blog_edit');
            $app->post('save_blog', [BlogController::class, 'store'])->name('save_blog');
            $app->post('update_blog', [BlogController::class, 'update'])->name('update_blog');
        });
    });
});