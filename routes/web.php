<?php

use App\Models\File;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/recent', function () {
    return view('recent');
})->name('recent');
Route::middleware(['auth:sanctum', 'verified'])->get('/bin', function () {
    return view('bin');
})->name('bin');

Route::get('/test', function () {
    $user = User::first();

    $file = new File([
        'name' => 'test.txt',
        'uuid' => (string) Str::uuid(),
        'size' => 100,
    ]);

    $user->files()->save(
        $file
    );

    if (!file_exists($user->user_drive)) {
        mkdir($user->user_drive, 0777, true);
    }

    file_put_contents($file->file_path, 'test');

   

    return $user->files;
});

Route::get('/test2', function () {
    $user = User::first();

    

    $user->folders()->save(
        new Folder(
            [
                'name' => 'notporns',
            ]
        )
    );

    $file = new File([
        'name' => 'test.txt',
        'uuid' => (string) Str::uuid(),
        'size' => 100,
        'user_id' => $user->id,
        'folder_id' => $user->folders()->first()->id
    ]);

    $file->save();

    if (!file_exists($user->user_drive)) {
        mkdir($user->user_drive, 0777, true);
    }

    file_put_contents($file->file_path, 'test');

   

    return $user->folders;
});

Route::get('/file/{id}', function ($id) {
    $file = File::find($id);
    return response()->download($file->file_path);
});
