<?php

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

use App\Transaction;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/unauthorize', function () {
    return '<h3>Access Denied!</h3><br><a href="/1_dms/public">HOME</a>';
});

Auth::routes();

// Auth
Route::get('/change/password', 'HomeController@changepw')->name('changepw');

// Tables
Route::resources([
    'users' => 'UsersController',
    'danpla' => 'DanplaController',
    'templist' => 'TempListController',
    'transaction' => 'TransactionController',
    'scrapdanpla' => 'ScrapDanplaController',
    'scraptemp' => 'ScrapTempController',
]);

// Custom Table Resource
Route::post('/transact','TransactionController@transact');
Route::post('/scrap','ScrapDanplaController@scrap');
Route::post('/scrapdanpla/transfer','ScrapDanplaController@transfer');
Route::put('/users/changepass/{id}','UsersController@changepass');

// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/userslist', 'AdminController@userslist')->name('userslist')->middleware('auth','admin');
Route::get('/adduser', 'AdminController@adduser')->name('adduser');
// Load Div
Route::get('/userinfo/{id}', 'AdminController@userinfo')->name('userinfo');

// Masterlist
Route::get('/master', 'MasterlistController@index')->name('master');
Route::get('/master/danpla', 'MasterlistController@danpla')->name('danpla');
Route::get('/master/transaction', 'MasterlistController@transaction')->name('transaction');
Route::get('/master/scrap', 'MasterlistController@scrap')->name('scrap');
Route::get('/master/transactiondanpla/{id}', 'MasterlistController@transactiondanpla')->name('transactiondanpla');

// Scan
Route::get('/scan', 'ScanController@index')->name('scan');
Route::get('/scan/inout', 'ScanController@inout')->name('inout');
Route::get('/scan/scrap', 'ScanController@scrap')->name('scrap');
Route::get('/templist1', 'ScanController@templist')->name('templist');
Route::get('/templist2', 'ScanController@templist2')->name('templist2');

// Search
Route::get('/master/danpla/{txt}', 'SearchController@searchdanpla')->name('searchdanpla');
Route::get('/master/transaction/{txt}', 'SearchController@searchtransaction')->name('searchtransaction');
Route::get('/master/scrap/{txt}', 'SearchController@searchscrap')->name('searchscrap');
Route::get('/userslist/{txt}', 'SearchController@searchuser')->name('searchuser')->middleware('auth','admin');

// Exporting
Route::get('/master/danpla/export/all', 'DanplaController@exportall')->name('exportall');
Route::get('/master/transaction/export/all', 'TransactionController@export')->name('transact_export');
Route::get('/master/scrapdanpla/export/all', 'ScrapDanplaController@export')->name('scrap_export');

// Test
Route::get('/test', function(){
    $tnum = '';
    $pic = '';
    $type = 2;
    $location = '';

    $query = Transaction::join('dmsdatabase.transaction_types', 'dmsdatabase.transaction_types.id', '=', 'dmsdatabase.transactions.type_id')
                    ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.transactions.location_id')
                    ->join('dmsdatabase.users', 'dmsdatabase.users.id', '=', 'dmsdatabase.transactions.pic_id')
                    ->select('dmsdatabase.transactions.number','dmsdatabase.transaction_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.users.name as pic');
        
        if($tnum != ''){
            $query = $query->where('number','like','%'.$tnum.'%');
        }
        if($pic != ''){
            $query = $query->where('pic_id',$pic);
        }
        if($type != ''){
            $query = $query->where('type_id',$type);
        }
        if($location != ''){
            $query = $query->where('location_id',$location);
        }
        return $query->get();
});