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

Route::get('/', 'CertificadoController@index')->name('index');
Route::get('/certificadosgerados', 'CertificadoController@certificadosGerados')->name('certificados');
Route::get('/certificado/{id}', 'CertificadoController@visualizarCertificado')->name('visualizarCertificado');
Route::post('/cadastrar', 'CertificadoController@cadastrarEnviarCertificado')->name('cadastrarCertificado');
