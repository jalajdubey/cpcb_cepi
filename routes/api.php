<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::post('/login' , [ApiController::class, 'login']);
Route::post('/cpcblogin' , [ApiController::class, 'cpcblogin']);
Route::post('/entities' , [ApiController::class, 'getentities']);
Route::post('/inspections' , [ApiController::class, 'getinspections']);
Route::post('/users' , [ApiController::class, 'getuserDetails']);
Route::post('/addinspection' , [ApiController::class, 'AddInspection']);
Route::post('/nodal', [ApiController::class, 'getNodalDetails']);
Route::post('/addnewentity' , [ApiController::class, 'AddEntity']);
Route::post('/allentities' , [ApiController::class, 'getallentities']);
Route::post('/inspectedentities' , [ApiController::class, 'getinspectedentities']);
Route::post('viewdailyreports' , [ApiController::class, 'fetchdailyreports']);
Route::post('getsummary' , [ApiController::class, 'getstatewisesummary']);


