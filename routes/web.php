<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ProjectProposalController;
use App\Http\Controllers\ProgramController;

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




Route::get('/weclome', [UserController::class, 'notify'])->name('welcome');

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/proposal', [PostController::class, 'proposal'])->middleware(['auth', 'verified'])->name('proposal');
Route::get('/', [PostController::class, 'lnuShow'])->name('lnu');

Route::get('/mark-as-read/{id}', [PostController::class, 'markasread'])->name('markasread');

Route::get('/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'can:edit-blog-posts'])->name('posts.edit');
Route::patch('/store/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::get('/create', [PostController::class, 'create'])->middleware(['auth', 'can:create-blog-posts'])->name('posts.create');
Route::post('/store', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
Route::delete('/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'can:delete-blog-posts'])->name('posts.delete');



Route::get('/latestEvents', [LatestController::class, 'LatestEvents'])->name('lnu-partials.lnu-latest-section');







Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');



    Route::get('/main', [UserController::class, 'mainIndex'])->name('users.main');
    Route::get('/search', [UserController::class, 'searchUser'])->name('users.search');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');

    Route::post('/users/{user}/permission', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');


    Route::get('/latest/edit/{id}', [LatestController::class, 'edit'])->name('latest-events.edit');
    Route::patch('/latest/update/{id}', [LatestController::class, 'update'])->name('latest-events.update');
    Route::get('/latest/create', [LatestController::class, 'create'])->name('latest-events.create');
    Route::post('latest/store', [LatestController::class, 'store'])->name('latest-events.store');
    Route::get('/latest', [LatestController::class, 'index'])->name('latest-events.index');
    Route::delete('/latest/delete/{id}', [LatestController::class, 'delete'])->name('latest-events.delete');

    Route::get('/latest-news/edit/{id}', [LatestNewsController::class, 'edit'])->name('latest-news.edit');
    Route::patch('/latest-news/update/{id}', [LatestNewsController::class, 'update'])->name('latest-news.update');
    Route::get('/latest-news/create', [LatestNewsController::class, 'create'])->name('latest-news.create');
    Route::post('latest-news/store', [LatestNewsController::class, 'store'])->name('latest-news.store');
    Route::get('/latest-news', [LatestNewsController::class, 'index'])->name('latest-news.index');
    Route::delete('/latest-news/delete/{id}', [LatestNewsController::class, 'delete'])->name('latest-news.delete');

    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');


    Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

    Route::get('/propsal', [ProjectProposalController::class, 'index'])->name('proposal.index');
    Route::get('/propsal/{id}', [ProjectProposalController::class, 'show'])->name('proposal.show');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
