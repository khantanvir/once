<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Agent\AgentController;

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

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('agent/invitation/{code?}/{branch_name?}/{branch_id?}', [App\Http\Controllers\Agent\AgentController::class, 'become_new_agent']);

Route::controller(AgentController::class)->group(function() {
    Route::get('agent/invitation/{code?}/{branch_name?}/{branch_id?}','become_new_agent');
    Route::get('get-branch-by-country/{id?}','get_branch_by_country');
    Route::post('become-new-agent-post','become_new_agent_post');
});