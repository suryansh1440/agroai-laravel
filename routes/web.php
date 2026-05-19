<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactUsMail;

use App\Http\Controllers\AgroController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/expertise', function () { return view('pages.expertise'); })->name('expertise');
Route::get('/groups', function () { return view('pages.groups'); })->name('groups');
Route::get('/training', function () { return view('pages.training'); })->name('training');
Route::get('/media', function () { return view('pages.media'); })->name('media');
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');

Route::get('/case-study/maharashtra', function () { return view('pages.case-study'); })->name('case-study.maharashtra');
Route::get('/press-release/funding', function () { return view('pages.press-release'); })->name('press-release.funding');

Route::post('/contact', function (Request $request) {
    $details = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    Mail::to('suryansh1440@gmail.com')->send(new ContactUsMail($details));

    return back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AgroController::class, 'index'])->name('dashboard');
    
    Route::get('/crop-recommendation', [AgroController::class, 'cropRecommendation'])->name('crop.recommendation');
    Route::post('/crop-recommendation', [AgroController::class, 'processCropRecommendation']);
    
    Route::get('/pest-prediction', [AgroController::class, 'pestPrediction'])->name('pest.prediction');
    Route::post('/pest-prediction', [AgroController::class, 'processPestPrediction']);
    
    Route::get('/irrigation-tips', [AgroController::class, 'irrigationTips'])->name('irrigation.tips');
    Route::post('/irrigation-tips', [AgroController::class, 'processIrrigationTips']);
    
    Route::get('/chatbot', [AgroController::class, 'chatbot'])->name('chatbot');
    Route::post('/chatbot', [AgroController::class, 'processChat']);
    Route::post('/chatbot/clear', [AgroController::class, 'clearChat'])->name('chatbot.clear');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
