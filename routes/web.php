<?php

use Illuminate\Http\Request;
use App\Http\Middleware\AgeChecker;

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

Route::get('/abp', function (Request $request) {
    $nama = $request->input('nama-lengkap', 'Anonim');
    $nama = $request->nama_lengkap ?: 'Anonim';
    $userAgent = $request->header('User-Agent');

    return 'Welcome to ABP, '.$nama;
});

// Route::get('/mahasiswa/{nim}', function ($nim) {
//     return 'NIM: '.$nim;
// });

Route::get('/mahasiswa/{nim}', 'AbpController@getMahasiswa')->middleware('age');
Route::get('/get/{nim}', 'AbpController@getMahasiswa')->middleware([
    AgeChecker::class,
    UsernameChecker::class
]);

Route::get('/mahalama', function () {
    return redirect('/mahasiswa/12345')->with('pesan', 'Mahalama sudah tidak ada');
})->middleware('web');


Route::get('/students', 'MahasiswaController@showAll');
Route::get('/students/{nim}', 'MahasiswaController@showMahasiswa')->name('students.detail');

Route::get('/students_add', 'MahasiswaController@showAdd');
Route::post('/students_add', 'MahasiswaController@simpan');

Route::get('/image/{filename}', 'ImageController@sendFile');
