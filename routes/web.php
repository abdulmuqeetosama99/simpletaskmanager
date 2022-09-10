<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
Route::post('task_show',[App\Http\Controllers\TaskController::class, 'show']);

Route::get('task_delete/{id}',[App\Http\Controllers\TaskController::class, 'destroy'])->name('task_delete');

Route::get('task_create',[App\Http\Controllers\TaskController::class, 'create'])->name('task_create');
Route::post('task_submit',[App\Http\Controllers\TaskController::class, 'store'])->name('task_submit');
Route::get('task_edit/{id}',[App\Http\Controllers\TaskController::class, 'edit'])->name('task_edit');
Route::post('task_update/{id}',[App\Http\Controllers\TaskController::class, 'update'])->name('task_update');
Route::post('task_completed/{id}',[App\Http\Controllers\TaskController::class, 'completed'])->name('task_completed');
