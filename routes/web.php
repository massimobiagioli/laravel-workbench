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

Route::get('/', function () {
    // Ricava elenco scripts
    $scripts = [];
    $fileList = glob(base_path('public') . '/static/js/*.js');
    foreach ($fileList as $file) {
        $type = explode('.', basename($file))[0];
        $scripts[$type] = '/static/js/' . basename($file);
    }
    
    // Ricava elenco css
    $styles = array_map(function($style) {
        return '/static/css/' . basename($style);
    }, glob(base_path('public') . '/static/css/*.css'));
    
    // Effettua render della view
    return view('welcome', [
        'styles' => $styles,
        'scripts' => $scripts
    ]);
});
