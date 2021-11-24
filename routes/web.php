<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Law\DisciplinaryActionController;
use App\Http\Controllers\Law\ClaimController;
use App\Http\Controllers\Law\CountClaimController;
use App\Http\Controllers\Law\ResponsibilityController;
use App\Http\Controllers\Law\AppealController;
use App\Http\Controllers\Law\RevisionController;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\Admin\FactController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\EntityController;
use App\Http\Controllers\Admin\ConceptController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\DataTableController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);

	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


	Route::get('users/editPass/{user}', [App\Http\Controllers\UserController::class, 'editPass']);

	Route::put('users/updatePass/{user}', [App\Http\Controllers\UserController::class, 'updatePass']);

	Route::resource('user', 'App\Http\Controllers\UserController')->middleware('can:users');


	 //Reportes

	 Route::get('/disciplinaryActions/funcionario', [DisciplinaryActionController::class, 'funcionario'])->name('disciplinaryActions.funcionario');

	 Route::get('/disciplinaryActions/cuadro', [DisciplinaryActionController::class, 'cuadro'])->name('disciplinaryActions.cuadro');
	 
	 Route::get('/disciplinaryActions/trabajador', [DisciplinaryActionController::class, 'trabajador'])->name('disciplinaryActions.trabajador');

	 Route::get('/responsibilities/report', [ResponsibilityController::class, 'report'])->name('responsibilities.report');

	 Route::get('/doneClaims/report', [ClaimController::class, 'doneReport'])->name('doneClaims.report');

	 Route::get('/receivedClaims/report', [ClaimController::class, 'receivedReport'])->name('receivedClaims.report');

	 Route::get('/countClaims/report', [CountClaimController::class, 'report'])->name('countClaims.report');




	Route::resource('disciplinaryActions', DisciplinaryActionController::class)->middleware('can:legal actions')->names('law.disciplinaryActions');

	Route::resource('responsibilities', ResponsibilityController::class)->middleware('can:legal actions')->names('law.responsibilities');
	
	Route::resource('claims', ClaimController::class)->middleware('can:legal actions')->names('law.claims');
	
	Route::resource('countClaims', CountClaimController::class)->middleware('can:legal actions')->names('law.countClaims');
	
	Route::resource('actions', ActionController::class)->middleware('can:nomenclators')->names('admin.actions');

	Route::resource('facts', FactController::class)->middleware('can:nomenclators')->names('admin.facts');

	Route::resource('areas', AreaController::class)->middleware('can:nomenclators')->names('admin.areas');

	Route::resource('entities', EntityController::class)->middleware('can:nomenclators')->names('admin.entities');

	Route::resource('concepts', ConceptController::class)->middleware('can:nomenclators')->names('admin.concepts');

	Route::resource('workers', WorkerController::class)->middleware('can:workers')->names('admin.workers');

    //Llenado de datatables

	Route::get('users/datatableUser',[App\Http\Controllers\UserController::class, 'datatableUser'])->name('users.datatableUser');

	Route::post('workers/datatableWorker',[WorkerController::class, 'datatableWorker'])->name('admin.workers.datatableWorker');
	
	Route::post('/datatable/claims', [DataTableController::class,'claims'])->name('datatable.claims');
	
	Route::post('/datatable/countClaims',[DataTableController::class, 'countClaims'])->name('datatable.countClaims');
	
	Route::post('/datatable/responsibilities',[DataTableController::class, 'responsibilities'])->name('datatable.responsibilities');
	
	Route::post('/datatable/disciplinaryActions',[DataTableController::class, 'disciplinaryActions'])->name('datatable.disciplinaryActions');



	Route::post('/report/funcionario',[DataTableController::class, 'reportFuncionario'])->name('report.funcionario');

	Route::post('/report/cuadro',[DataTableController::class, 'reportCuadro'])->name('report.cuadro');

	Route::post('/report/regular',[DataTableController::class, 'reportRegular'])->name('report.regular');

	Route::post('/report/disciplinaryAction',[DataTableController::class, 'reportDisciplinaryAction'])->name('report.disciplinaryAction');

	Route::post('/report/doneClaim',[DataTableController::class, 'reportDoneClaim'])->name('report.doneClaim');

	Route::post('/report/receivedClaim',[DataTableController::class, 'reportReceivedClaim'])->name('report.receivedClaim');

	Route::post('/report/countClaim',[DataTableController::class, 'reportCountClaim'])->name('report.countClaim');

	// Apelaciones
	
	Route::get('appeals/create/{id}/tipo/{type}',[AppealController::class, 'create'])->name('appeals.create');

	Route::get('appeals/index/{id}/tipo/{type}',[AppealController::class, 'index'])->name('appeals.index');

	Route::get('appeals/edit/{appeal}',[AppealController::class, 'edit'])->name('appeals.edit');

	Route::put('appeals/update/{appeal}',[AppealController::class, 'update'])->name('appeals.update');

	Route::delete('appeals/destroy/{appeal}',[AppealController::class, 'destroy'])->name('appeals.destroy');
	
	Route::post('appeals/store/{id}/tipo/{type}',[AppealController::class, 'storeAppeal'])->name('appeals.storeAppeal');


	//Revisiones

	Route::get('revisions/create/{id}/tipo/{type}',[RevisionController::class, 'create'])->name('revisions.create');

	Route::get('revisions/index/{id}/tipo/{type}',[RevisionController::class, 'index'])->name('revisions.index');

	Route::get('revisions/edit/{revision}',[RevisionController::class, 'edit'])->name('revisions.edit');

	Route::put('revisions/update/{revision}',[RevisionController::class, 'update'])->name('revisions.update');

	Route::delete('revisions/destroy/{revision}',[RevisionController::class, 'destroy'])->name('revisions.destroy');
	
	Route::post('revisions/store/{id}/tipo/{type}',[RevisionController::class, 'storeRevision'])->name('revisions.storeRevision');


   
	
	





});

