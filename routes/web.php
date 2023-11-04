<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/prueba', function () {
//     return view('prueba');
// });

Route::get('reports/reports_purchases', 'ReportController@reports_purchases')->name('reports.purchases');
Route::post('reports/reports_purchases_results', 'ReportController@reports_purchases_results')->name('reports.purchasesresults');

Route::get('reports/reports_sales', 'ReportController@reports_sales')->name('reports.sales');
Route::post('reports/reports_sales_results', 'ReportController@reports_sales_results')->name('reports.salesresults');

Route::get('reports/reports_productstates', 'ReportController@reports_productstates')->name('reports.productstates');
Route::get('reports/reports_productexpired', 'ReportController@reports_productexpired')->name('reports.productexpired');
Route::get('reports/reports_productimperfect', 'ReportController@reports_productimperfect')->name('reports.productimperfect');
Route::get('reports/reports_productobsolete', 'ReportController@reports_productobsolete')->name('reports.productobsolete');
Route::post('reports/reports_productstates_results', 'ReportController@reports_productstates_results')->name('reports.productstatesresults');

Route::resource('categories','CategoryController')->names('categories');
Route::resource('clients','ClientController')->names('clients');
Route::resource('products','ProductController')->names('products');
Route::resource('providers','ProviderController')->names('providers');
Route::resource('purchases','PurchaseController')->names('purchases');
Route::resource('sales','SaleController')->names('sales');
Route::resource('productstatedetails','ProductStateDetailController')->names('productstatedetails');

Route::get('purchases/pdf/{purchase}','PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}','SaleController@pdf')->name('sales.pdf');

Route::get('sales/print/{sale}','SaleController@print')->name('sales.print');

Route::resource('companies','CompanyController')->names('companies')->only(['index', 'update']);
// Route::resource('printers','PrinterController')->names('printers')->only(['index', 'update']);

// Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('get_clients_by_dni', 'ClientController@get_clients_by_dni')->name('get_clients_by_dni');
Route::get('get_clients_by_id', 'ClientController@get_clients_by_id')->name('get_clients_by_id');

Route::get('get_providers_by_ruc', 'ProviderController@get_providers_by_ruc')->name('get_providers_by_ruc');

Auth::routes(['register' => false]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
