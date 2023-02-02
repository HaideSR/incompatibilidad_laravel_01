<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificadoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/lecturarDocumento/declaraciones/{archivo}',[VerificadoController::class, 'showDocs'])->name('showDocs');
Route::post('/notificar/aprobacion/declaraciones/{archivo}/{id}',[VerificadoController::class, 'notificationDocs'])->name('notificationDocs');

