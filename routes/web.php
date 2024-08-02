<?php

use App\Models\Admin;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SoalUjianController;
use App\Http\Controllers\BakeryPageController;
use App\Http\Controllers\HasilUjianController;
use App\Http\Controllers\JenisUjianController;
use App\Http\Controllers\KontakPageController;
use App\Http\Controllers\ModernPageController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\BaristaPageController;
use App\Http\Controllers\ModulMateriController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProgramStudyController;
use App\Http\Controllers\InformasiPageController;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\TradisionalPageController;
use App\Http\Controllers\ProgramPelatihanPageController;

//======DASHBOARD========

Route::get('/', function () {
    return view('dashboard.index');
})->name('home');
// Route::get('/profile', function () {
//     return view('profile.index');
// })->name('profile');

Route::get('/home', function () {
    return view('dashboard.index');
})->name('home');

Route::get('/programstudi', function () {
    return view('programstudi.index');
})->name('programstudi');

Route::get('/programstudi/bakery', function () {
    return view('programstudi.bakery');
})->name('bakery');

Route::get('/programstudi/modern-food', function () {
    return view('programstudi.modern');
})->name('modern');

Route::get('/programstudi/tradisional-food', function () {
    return view('programstudi.tradisional');
})->name('tradisional');

Route::get('/programstudi/barista', function () {
    return view('programstudi.barista');
})->name('barista');

Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak');

// Route::get('/informasi', function () {
//     return view('informasi.informasi');
// })->name('informasi');


Route::get('/login', function () {
    return view('login.login');
})->name('login');


//======login========

Route::POST('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran');
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.index');
Route::get('/admin/pendaftaran', [PendaftaranController::class,'index'])->name('pendaftaran.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    Route::get('/admin/dashboard',$data, [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admins/dashboard', [PegawaiController::class, 'dashboard'])->name('admins.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    // Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/logout', [AdminController::class,'logout'])->name('logout');
});


//======ADMIN========

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Route::get('/informasi-page', [AdminController::class, 'index'])->name('informasi-page.index');
    // Route::get('/informasi-page/create', [AdminController::class, 'create'])->name('informasi-page.create');
    // Route::post('/informasi-page', [AdminController::class, 'store'])->name('informasi-page.store');
    // Route::get('/informasi-page/{informasiPage}/edit', [AdminController::class, 'edit'])->name('informasi-page.edit');
    // Route::put('/informasi-page/{informasiPage}', [AdminController::class, 'update'])->name('informasi-page.update');
    // Route::delete('/informasi-page/{informasiPage}', [AdminController::class, 'destroy'])->name('informasi-page.destroy');
    // Route::get('/informasi-page/{informasiPage}', [AdminController::class, 'show'])->name('informasi-page.show');
});

//======Surat========

Route::resource('surat', SuratController::class);
Route::get('/admin/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('admin//surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
Route::get('/surat/{surat}/edit', [SuratController::class, 'edit'])->name('surat.edit');
Route::put('/surat/{surat}', [SuratController::class, 'update'])->name('surat.update');
Route::delete('/surat/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');
Route::get('/surat/{surat}', [SuratController::class, 'show'])->name('surat.show');
Route::get('/surat/{surat}/download', [SuratController::class, 'download'])->name('surat.download');

Route::get('/surat/{surat}', [SuratController::class, 'show'])->name('surat.show');
Route::get('/about', function () {
    return view('surat.about');
})->name('about');

Route::get('/kategori', [KategoriSuratController::class, 'index'])->name('surat.index_kategori');
Route::post('/kategori', [KategoriSuratController::class, 'store'])->name('kategori.store');
Route::get('/kategori/create', [KategoriSuratController::class, 'create'])->name('kategori.create');
Route::get('/kategori/{kategori}/edit', [KategoriSuratController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriSuratController::class,'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriSuratController::class,'destroy'])->name('kategori.destroy');


//======SERTIFIKAT========
Route::resource('sertifikat', SertifikatController::class);
Route::get('/admin/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
Route::get('/surat/create', [SertifikatController::class, 'create'])->name('sertifikat.create');
Route::post('/admin/sertifikat/', [SertifikatController::class, 'store'])->name('sertifikat.store');
Route::delete('/admin/sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
Route::get('/admin/sertifikat/{sertifikat}', [SertifikatController::class, 'show'])->name('sertifikat.show');
Route::get('/admin/{sertifikat}/download', [SertifikatController::class, 'download'])->name('sertifikat.download');


Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('sertifikat.index_pelatihan');
Route::post('/pelatihan', [PelatihanController::class, 'store'])->name('pelatihan.store');
Route::put('/pelatihan/{pelatihan}', [PelatihanController::class,'update'])->name('pelatihan.update');
Route::get('/pelatihan/{pelatihan}/edit', [PelatihanController::class,'edit'])->name('pelatihan.edit');
Route::delete('/pelatihan/{pelatihan}', [PelatihanController::class,'destroy'])->name('pelatihan.destroy');


//=====INFORMASI PAGE======
Route::resource('informasi-page', InformasiPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/informasi-page', [InformasiPageController::class, 'index'])->name('informasi-page.index');
Route::get('/informasi-page/create', [InformasiPageController::class, 'create'])->name('admin.informasi-page.create');
Route::post('/informasi-page/store', [InformasiPageController::class, 'store'])->name('admin.informasi-page.store');
Route::get('/informasi-page/{informasi_page}/edit', [InformasiPageController::class, 'edit'])->name('admin.informasi-page.edit');
Route::put('/informasi-page/{informasi_page}', [InformasiPageController::class, 'update'])->name('admin.informasi-page.update');
Route::delete('/informasi-page/{informasi_page}', [InformasiPageController::class, 'destroy'])->name('admin.informasi-page.destroy');
Route::get('/informasipage', [InformasiPageController::class, 'getInformasiPages'])->name('informasi');
Route::post('/admin/informasipage/update-order', [InformasiPageController::class, 'updateOrder'])->name('admin.informasi-page.updateOrder');


//=====PROFILE PAGE======

Route::resource('profile-page', ProfileController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/profile-page', [ProfileController::class, 'index'])->name('profile-page.index');
Route::get('/profile-page/create', [ProfileController::class, 'create'])->name('admin.profile-page.create');
Route::post('/profile-page/store', [ProfileController::class, 'store'])->name('admin.profile-page.store');
Route::get('/profile-page/{profile_pages}/edit', [ProfileController::class, 'edit'])->name('admin.profile-page.edit');
Route::put('/profile-page/{profile_pages}', [ProfileController::class, 'update'])->name('admin.profile-page.update');
Route::delete('/profile-page/{profile_pages}', [ProfileController::class, 'destroy'])->name('admin.profile-page.destroy');
Route::get('/profilepage', [ProfileController::class, 'getProfilePages'])->name('profile');
Route::post('/admin/profile-page/update-order', [ProfileController::class, 'updateOrder'])->name('admin.profile-page.updateOrder');


//=====PROGRAM PELATIHAN PAGE======

Route::resource('program-pelatihan-page', ProgramPelatihanPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/program-pelatihan-page', [ProgramPelatihanPageController::class, 'index'])->name('program-pelatihan-page.index');
Route::get('/program-pelatihan-page/create', [ProgramPelatihanPageController::class, 'create'])->name('admin.program-pelatihan-page.create');
Route::post('/program-pelatihan-page/store', [ProgramPelatihanPageController::class, 'store'])->name('admin.program-pelatihan-page.store');
Route::get('/program-pelatihan-page/{program-pelatihan_pages}/edit', [ProgramPelatihanPageController::class, 'edit'])->name('admin.program-pelatihan-page.edit');
Route::put('/program-pelatihan-page/{program-pelatihan_pages}', [ProgramPelatihanPageController::class, 'update'])->name('admin.program-pelatihan-page.update');
Route::delete('/program-pelatihan-page/{program-pelatihan_pages}', [ProgramPelatihanPageController::class, 'destroy'])->name('admin.program-pelatihan-page.destroy');
Route::get('/program-pelatihanpage', [ProgramPelatihanPageController::class, 'getprogrampelatihanPages'])->name('program-pelatihan');
Route::post('/admin/program-pelatihan-page/update-order', [ProgramPelatihanPageController::class, 'updateOrder'])->name('admin.program-pelatihan-page.updateOrder');


//=====BARISTA PAGE======

Route::resource('barista-page', BaristaPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/barista-page', [BaristaPageController::class, 'index'])->name('barista-page.index');
Route::get('/barista-page/create', [BaristaPageController::class, 'create'])->name('admin.barista-page.create');
Route::post('/barista-page/store', [BaristaPageController::class, 'store'])->name('admin.barista-page.store');
Route::get('/barista-page/{barista_pages}/edit', [BaristaPageController::class, 'edit'])->name('admin.barista-page.edit');
Route::put('/barista-page/{barista_pages}', [BaristaPageController::class, 'update'])->name('admin.barista-page.update');
Route::delete('/barista-page/{barista_pages}', [BaristaPageController::class, 'destroy'])->name('admin.barista-page.destroy');
Route::get('/baristapage', [BaristaPageController::class, 'getBaristaPages'])->name('barista');
Route::post('/admin/barista-page/update-order', [BaristaPageController::class, 'updateOrder'])->name('admin.barista-page.updateOrder');

//=====BAKERY PAGE======

Route::resource('bakery-page', BakeryPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/bakery-page', [BakeryPageController::class, 'index'])->name('bakery-page.index');
Route::get('/bakery-page/create', [BakeryPageController::class, 'create'])->name('admin.bakery-page.create');
Route::post('/bakery-page/store', [BakeryPageController::class, 'store'])->name('admin.bakery-page.store');
Route::get('/bakery-page/{bakery_pages}/edit', [BakeryPageController::class, 'edit'])->name('admin.bakery-page.edit');
Route::put('/bakery-page/{bakery_pages}', [BakeryPageController::class, 'update'])->name('admin.bakery-page.update');
Route::delete('/bakery-page/{bakery_pages}', [BakeryPageController::class, 'destroy'])->name('admin.bakery-page.destroy');
Route::get('/bakerypage', [BakeryPageController::class, 'getbakeryPages'])->name('bakery');
Route::post('/admin/bakery-page/update-order', [BakeryPageController::class, 'updateOrder'])->name('admin.bakery-page.updateOrder');


//=====MODERN PAGE======

Route::resource('modern-page', ModernPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/modern-page', [ModernPageController::class, 'index'])->name('modern-page.index');
Route::get('/modern-page/create', [ModernPageController::class, 'create'])->name('admin.modern-page.create');
Route::post('/modern-page/store', [ModernPageController::class, 'store'])->name('admin.modern-page.store');
Route::get('/modern-page/{modern_pages}/edit', [ModernPageController::class, 'edit'])->name('admin.modern-page.edit');
Route::put('/modern-page/{modern_pages}', [ModernPageController::class, 'update'])->name('admin.modern-page.update');
Route::delete('/modern-page/{modern_pages}', [ModernPageController::class, 'destroy'])->name('admin.modern-page.destroy');
Route::get('/modernpage', [ModernPageController::class, 'getmodernPages'])->name('modern');
Route::post('/admin/modern-page/update-order', [ModernPageController::class, 'updateOrder'])->name('admin.modern-page.updateOrder');


//=====TRADISIONAL PAGE======

Route::resource('tradisional-page', TradisionalPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/tradisional-page', [TradisionalPageController::class, 'index'])->name('tradisional-page.index');
Route::get('/tradisional-page/create', [TradisionalPageController::class, 'create'])->name('admin.tradisional-page.create');
Route::post('/tradisional-page/store', [TradisionalPageController::class, 'store'])->name('admin.tradisional-page.store');
Route::get('/tradisional-page/{tradisional_pages}/edit', [TradisionalPageController::class, 'edit'])->name('admin.tradisional-page.edit');
Route::put('/tradisional-page/{tradisional_pages}', [TradisionalPageController::class, 'update'])->name('admin.tradisional-page.update');
Route::delete('/tradisional-page/{tradisional_pages}', [TradisionalPageController::class, 'destroy'])->name('admin.tradisional-page.destroy');
Route::get('/tradisionalpage', [TradisionalPageController::class, 'gettradisionalPages'])->name('tradisional');
Route::post('/admin/tradisional-page/update-order', [TradisionalPageController::class, 'updateOrder'])->name('admin.tradisional-page.updateOrder');

//=====KONTAK PAGE======

Route::resource('kontak-page', KontakPageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/kontak-page', [KontakPageController::class, 'index'])->name('kontak-page.index');
Route::get('/kontak-page/create', [KontakPageController::class, 'create'])->name('admin.kontak-page.create');
Route::post('/kontak-page/store', [KontakPageController::class, 'store'])->name('admin.kontak-page.store');
Route::get('/kontak-page/{kontak_pages}/edit', [KontakPageController::class, 'edit'])->name('admin.kontak-page.edit');
Route::put('/kontak-page/{kontak_pages}', [KontakPageController::class, 'update'])->name('admin.kontak-page.update');
Route::delete('/kontak-page/{kontak_pages}', [KontakPageController::class, 'destroy'])->name('admin.kontak-page.destroy');
Route::get('/kontakpage', [KontakPageController::class, 'getkontakPages'])->name('kontak');
Route::post('/admin/kontak-page/update-order', [KontakPageController::class, 'updateOrder'])->name('admin.kontak-page.updateOrder');

//=====HOME PAGE======

Route::resource('home-page', HomePageController::class)->except([
    'edit', 'update', 'destroy'
]);

Route::get('/home-page', [HomePageController::class, 'index'])->name('home-page.index');
Route::get('/home-page/create', [HomePageController::class, 'create'])->name('admin.home-page.create');
Route::post('/home-page/store', [HomePageController::class, 'store'])->name('admin.home-page.store');
Route::get('/home-page/{home_pages}/edit', [HomePageController::class, 'edit'])->name('admin.home-page.edit');
Route::put('/home-page/{home_pages}', [HomePageController::class, 'update'])->name('admin.home-page.update');
Route::delete('/home-page/{home_pages}', [HomePageController::class, 'destroy'])->name('admin.home-page.destroy');
Route::get('/homepage', [HomePageController::class, 'gethomePages'])->name('home');
Route::post('/admin/home-page/update-order', [HomePageController::class, 'updateOrder'])->name('admin.home-page.updateOrder');


///* route untuk pegawai */
Route::resource('pengajar', PengajarController::class);

Route::resource('program_study', ProgramStudyController::class);

Route::resource('soal_ujian', SoalUjianController::class);

Route::resource('siswa', SiswaController::class);
Route::get('/export-siswa', [SiswaController::class, 'exportToExcel'])->name('siswa.export');


Route::resource('peserta', PesertaController::class);

Route::resource('hasil_ujian', HasilUjianController::class);

Route::resource('modul_materi', ModulMateriController::class);

Route::resource('jenis_ujian', JenisUjianController::class);

Route::resource('materi', MateriController::class);

// ------------------------------------------------
//route untuk user

Route::get('/dashboard_user', [UserController::class, 'dashboard'])->name('dashboard_user');

Route::get('/ujian', [UjianController::class, 'ujian'])->name('ujian');
Route::get('/ujian/{kode_program_studi}/{id_jenis_ujian}', [UjianController::class, 'show'])->name('ujian.show');
Route::post('/ujian/submit', [UjianController::class, 'submit'])->name('ujian.submit');


Route::get('/debug-submit', [UjianController::class, 'debugSubmit']);

