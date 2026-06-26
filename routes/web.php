<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ExtracurricularGalleryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

// Rute Ganti Bahasa
Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Halaman Publik (Tanpa Login)
Route::get('/', function () {
    $posts = \App\Models\Post::with('author')->latest()->take(6)->get();
    $sliders = \App\Models\Slider::orderBy('order')->get();
    $majors = \App\Models\Major::all();
    $teachers = \App\Models\Teacher::oldest()->get();
    $features = \App\Models\Feature::orderBy('order')->get();
    return view('welcome', compact('posts', 'sliders', 'majors', 'teachers', 'features'));
})->name('home');

Route::get('/berita', [PostController::class, 'indexPublic'])->name('posts.public');
Route::get('/berita/{post:slug}', [PostController::class, 'showPublic'])->name('posts.show');

Route::get('/sejarah', function () {
    return view('pages.sejarah');
})->name('sejarah');

Route::get('/profil-kepala-sekolah', function () {
    return view('pages.profil-kepala-sekolah');
})->name('profil.kepala-sekolah');

Route::get('/jurusan/{major:slug}', [MajorController::class, 'showPublic'])->name('majors.show');
Route::get('/ekstrakurikuler/{extracurricular:slug}', [ExtracurricularController::class, 'showPublic'])->name('extracurriculars.show');
Route::get('/prestasi', [AchievementController::class, 'indexPublic'])->name('achievements.public');
Route::get('/prestasi/{achievement:slug}', [AchievementController::class, 'showPublic'])->name('achievements.show');

Route::get('/guru', function () {
    $teachers = \App\Models\Teacher::oldest()->get();
    return view('teachers.index', compact('teachers'));
})->name('teachers.public');

Route::get('/guru/{teacher:slug}', function (\App\Models\Teacher $teacher) {
    return view('teachers.show', compact('teacher'));
})->name('teachers.show');

// Halaman Dashboard Admin (Diproteksi Auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // CRUD Berita untuk Admin
    Route::resource('posts', PostController::class);

    // Manajemen Slider Utama
    Route::resource('sliders', SliderController::class)->except(['show']);

    // Manajemen Jurusan
    Route::resource('majors', MajorController::class)->except(['show']);

    // Manajemen Guru & Staf
    Route::resource('teachers', TeacherController::class)->except(['show']);

    // Manajemen Keunggulan / Fitur
    Route::resource('features', FeatureController::class)->except(['show']);

    // Manajemen Ekstrakurikuler
    Route::resource('extracurriculars', ExtracurricularController::class)->except(['show']);
    Route::get('extracurriculars/{extracurricular}/gallery', [ExtracurricularGalleryController::class, 'index'])->name('extracurriculars.gallery.index');
    Route::post('extracurriculars/{extracurricular}/gallery', [ExtracurricularGalleryController::class, 'store'])->name('extracurriculars.gallery.store');
    Route::delete('extracurriculars/{extracurricular}/gallery/{gallery}', [ExtracurricularGalleryController::class, 'destroy'])->name('extracurriculars.gallery.destroy');

    // Manajemen Prestasi
    Route::resource('achievements', AchievementController::class)->except(['show']);

    // Manajemen Pengaturan Profil Sekolah
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/sejarah', [SettingController::class, 'sejarah'])->name('settings.sejarah');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::middleware(['auth'])->group(function () {
    // Manajemen Profil bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
