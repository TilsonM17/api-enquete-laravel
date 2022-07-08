<?php

use App\Http\Controllers\Main;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/*localhost
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Main::class,'index'])->name('user');