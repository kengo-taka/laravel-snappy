<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});

Route::post('/pdf/pdf', [PDFController::class,'downloadPDF'])->name('pdf.download-pdf');
Route::post('/pdf/html', [PDFController::class,'showHTMLonBrowser'])->name('pdf.show-pdf');
Route::get('/pdf', [PDFController::class, 'index']);
