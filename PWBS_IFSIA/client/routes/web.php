<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route Untuk View Data Karyawan
Route::get("/", [Karyawan::class, 'index']);

// Route Untuk Hapus Data Karyawan
Route::delete("/delete/{parameter}", [Karyawan::class, 'delete']);

// Route untuk tambah data Karyawan
Route::get("/add", [Karyawan::class, 'add']);

// Route untuk simpan data Karyawan
Route::post("/insert", [Karyawan::class, 'insert']);

// Route untuk ubah data Karyawan
Route::get("/update/{parameter}", [Karyawan::class, 'update']);

// Route Untuk Hapus Data Karyawan
Route::put("/edit/{parameter}", [Karyawan::class, 'edit']);