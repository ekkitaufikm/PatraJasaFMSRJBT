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

Route::get('/', ('Landing\LandingController@index'));
Route::get('login', ('AuthController@login'));
Route::get('logout', ('AuthController@logout'));
Route::post('loginProses', ('AuthController@loginProses'));
Route::resource('landing', ('Landing\LandingController'));

//pengajuan untuk man power di landing page
Route::get('checklist/thanks', ('Landing\ChecklistController@thanks'));
Route::get('pengajuan_ketkerja/thanks', ('Landing\PengajuanKetkerjaController@thanks'));
Route::get('pengajuan_izin/thanks', ('Landing\PengajuanIzinController@thanks'));
Route::get('pengajuan_cuti/thanks', ('Landing\PengajuanCutiController@thanks'));
Route::get('pengajuan_lembur/thanks', ('Landing\PengajuanLemburController@thanks'));
Route::resource('checklist', 'Landing\ChecklistController');
Route::resource('pengajuan_ketkerja', ('Landing\PengajuanKetkerjaController'));
Route::resource('pengajuan_izin', ('Landing\PengajuanIzinController'));
Route::resource('pengajuan_cuti', ('Landing\PengajuanCutiController'));
Route::resource('pengajuan_lembur', ('Landing\PengajuanLemburController'));
// Route::get('register_paksa', ('AuthController@registerPaksa'));

Route::middleware(['login'])->group(function () {
    
    Route::middleware(['admin'])->group(function () {

        //data master
        Route::resource('admin/users', 'Admin\UsersController');
        Route::resource('admin/profil', 'Admin\ProfilController');

        //laporan bulanan SPV
        Route::resource('admin/rkb', 'Admin\RkbController');
        Route::resource('admin/laporan_mingguan', 'Admin\LaporanMingguanController');
        Route::resource('admin/inventori', 'Admin\InventoriController');
        Route::resource('admin/time_schedule', 'Admin\TimeScheduleController');

        Route::resource('admin/supervisor', 'Admin\SupervisorController');
        Route::resource('admin/manpower', 'Admin\ManPowerController');
        Route::resource('admin/mutasi', 'Admin\MutasiController');
        Route::resource('admin/pensiun', 'Admin\PensiunController');
        Route::resource('admin/resign', 'Admin\ResignController');
        Route::resource('admin/dashboard', 'Admin\DashboardController');
        Route::resource('admin/kelamin', 'Admin\KelaminController');
        Route::resource('admin/jabatan', 'Admin\JabatanController');
        Route::resource('admin/area', 'Admin\AreaController');

        Route::resource('admin/memo', 'Admin\MemoController');
        Route::resource('admin/konseling', 'Admin\KonselingController');
        Route::resource('admin/surat_peringatan', 'Admin\SPeringatanController');

        Route::resource('admin/checklist', 'Admin\ChecklistController');

        Route::resource('admin/pengajuan_izin', 'Admin\PengajuanIzinController');
        Route::resource('admin/pengajuan_cuti', 'Admin\CutiController');
        Route::resource('admin/pengajuan_lembur', 'Admin\PengajuanLemburController');
        Route::resource('admin/pengajuan_ketkerja', ('Admin\PengajuanKetkerjaController'));

        Route::resource('admin/import_karyawan', 'Admin\ImportKaryawanController');
        
        Route::resource('admin/agama', 'Admin\AgamaController');
        Route::resource('admin/alasan_cuti', 'Admin\AlasanCutiController');
        
    });

    Route::middleware(['supervisor'])->group(function () {

        //data maste
        Route::resource('supervisor/profil', 'Supervisor\ProfilController');

        //laporan bulanan SPV
        Route::resource('supervisor/rkb', 'Supervisor\RkbController');
        Route::resource('supervisor/laporan_mingguan', 'Supervisor\LaporanMingguanController');
        Route::resource('supervisor/inventori', 'Supervisor\InventoriController');
        Route::resource('supervisor/time_schedule', 'Supervisor\TimeScheduleController');

        Route::resource('supervisor/manpower', 'Supervisor\ManPowerController');
        Route::resource('supervisor/konseling', 'Supervisor\KonselingController');
        Route::resource('supervisor/surat_peringatan', 'Supervisor\SPeringatanController');

        Route::resource('supervisor/checklist', 'Supervisor\ChecklistController');

        Route::resource('supervisor/pengajuan_izin', 'Supervisor\PengajuanIzinController');
        Route::resource('supervisor/pengajuan_cuti', 'Supervisor\CutiController');
        Route::resource('supervisor/pengajuan_lembur', 'Supervisor\PengajuanLemburController');
        
    });
});
