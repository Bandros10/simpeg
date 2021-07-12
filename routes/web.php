<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:super admin']], function () {
        /**role */
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        /**users */
        Route::resource('/users', 'UserController')->except([
            'show'
        ]);

        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
        /**end users */
    });
    Route::group(['middleware' => ['role:HRD']], function(){
        Route::resource('/HRD/data_pegawai', 'HRDController');
        Route::get('/HRD/Aproval_cuti', 'AprovController@index')->name('aproval.index');
        Route::get('/HRD/Aproval_cuti/{id}', 'AprovController@data_aproval_cuti')->name('aproval.show');
        Route::post('/HRD/Aproval_cuti/{id_cuti}/approv', 'AprovController@update_status_approv')->name('aproval.update');
        Route::get('/catak/form_cuti/{id_cuti}','AprovController@cetak_form')->name('cetak.form_izin_cuti');
        /**
         * evaluasi controler
         */
        Route::resource('evaluasi', 'EvaluasiController')->except(['show']);
    });
    Route::group(['middleware' => ['role:kepala devisi marketing|kepala devisi administrasi']], function(){
        Route::get('kepala_devisi/tolak/pengajuan/{id}','KepalaController@tolak')->name('kepala.tolak');
        Route::post('kepala_devisi/update/{id}','KepalaController@update')->name('kepala.update');
        /**
         * marketing
         */
        Route::get('/kepala_devisi/Aproval_cuti/marketing', 'KepalaController@index_marketing')->name('aproval.kepala.index.marketing');
        Route::get('/kepala_devisi/Aproval_cuti/marketing/{id}', 'KepalaController@data_cuti_kepala_marketing')->name('kepala.show.marketing');
        Route::get('/all_pegawai/marketing','KepalaController@allmarketing')->name('market.all');
        Route::get('/penilaiana/{id}/maketing','KepalaController@penilaian_marketing')->name('penilaian.pegawai.marketing');
        /**
         * administrasi
         */
        Route::get('/kepala_devisi/Aproval_cuti/adminitrasi', 'KepalaController@index_administrasi')->name('aproval.kepala.index.administrasi');
        Route::get('/kepala_devisi/Aproval_cuti/adminitrasi/{id}', 'KepalaController@data_cuti_kepala_administrasi')->name('kepala.show.administrasi');
        Route::get('/all_pegawai/administrasi','KepalaController@alladministrasi')->name('admin.all');
    });
    Route::group(['middleware' => ['role:karyawan']], function(){
        Route::resource('/karyawan/cuti', 'KaryawanController');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




