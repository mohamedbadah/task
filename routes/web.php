<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
Route::get('app', function () {
    $tasks = DB::table('tasks')->get();
    return view('todo', compact('tasks'));
});
Route::post('store', function (Request $r) {
    DB::table('tasks')->insert([
        'title' => $r->title
    ]);
    return redirect()->back();
});
Route::post('del', function (Request $d) {
    $tasks = DB::table('tasks')->get();
    if (true) {
        foreach ($tasks as $t => $task) {

            DB::table('tasks')->where('title', '=', $d->title)->delete();
        }
    }
    return redirect()->back();
});
