<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/',  [HomeController::class, 'index'])->name('');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/uzivatelia', [UserController::class, 'index'])->name('users')->can('adminViewAny', App\Models\User::class);
    Route::get('/povolenia', [PermissionController::class, 'adminIndex'])->name('permissions')->can('adminIndex', App\Models\Permission::class);


#SKUPINY
    Route::get('/skupiny', [GroupController::class, 'index'])->name('groups')->can('viewAny', App\Models\Group::class);
    Route::post('/skupiny', [GroupController::class, 'store'])->name('group.add')->can('create', App\Models\Group::class);
    Route::get('/skupiny/upravit/{group}', [GroupController::class, 'edit'])->name('group.edit')->can('update', App\Models\Group::class);
    Route::patch('/skupiny/upravit/{group}', [GroupController::class, 'update'])->can('update', App\Models\Group::class);
    Route::delete('/skupiny/vymazat/{group}', [GroupController::class, 'delete'])->name('group.delete')->can('delete', App\Models\Group::class);
    
#SKUPINY - UŽÍVATEĽ
    Route::get('/skupiny/uzivatel/{user}', [GroupController::class, 'user'])->name('groups.user')->can('setUser', App\Models\Group::class);
    Route::patch('/skupiny/uzivatel/{user}', [GroupController::class, 'userSetGroup'])->name('groups.user.add')->can('setUser', App\Models\Group::class);

#POVOLENIA - UŹÍVATEĽ
    Route::get('/povolenia/uzivatel/{user}', [PermissionController::class, 'user'])->name('permissions.user')->can('setUser', App\Models\Permission::class);
    Route::patch('/povolenia/uzivatel/{user}', [PermissionController::class, 'userSave'])->can('setUser', App\Models\Permission::class);
#POVOLENIA - SKUPINY
    Route::get('/povolenia/skupina/{group}', [PermissionController::class, 'group'])->name('permissions.group')->can('setGroup', App\Models\Permission::class);
    Route::patch('/povolenia/skupina/{group}', [PermissionController::class, 'groupSave'])->can('setGroup', App\Models\Permission::class);


});



require __DIR__.'/auth.php';
