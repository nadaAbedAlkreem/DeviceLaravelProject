<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware(['Traffic', 'lang' ]);

 
Route::get('profile',[App\Http\Controllers\ProfileController::class,'profileView'])->name('profile');
Route::post('update/{id}',[App\Http\Controllers\ProfileController::class,'updateProfile'])->name('update');
Route::post('insert/setting',[App\Http\Controllers\SettingController::class,'store'])->name('insertSetting');
Route::get('logout' , [App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
/// category 
Route::get('category/view',[App\Http\Controllers\CategoryController::class,'view'])->name('category.view');
Route::get('category/form',[App\Http\Controllers\CategoryController::class,'formCategory'])->name('category.form');
Route::post('category/form/addAction',[App\Http\Controllers\CategoryController::class,'addActionCategory'])->name('category.actionAdd');
Route::get('category/form/EditView/{id}',[App\Http\Controllers\CategoryController::class,'formEditCategory'])->name('category.FormEdit');
Route::post('category/ActionEdit',[App\Http\Controllers\CategoryController::class,'actionEditCategory'])->name('category.ActionEdit');
Route::delete('category/form/DeleteView/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('delete');
////devices 
Route::get('/devices/view/',[App\Http\Controllers\DeviceController::class,'view'])->name('devices.view');
Route::get('/devices/form',[App\Http\Controllers\DeviceController::class,'formDevices'])->name('devices.form');
Route::post('/devices/form/addAction',[App\Http\Controllers\DeviceController::class,'addActionDevice'])->name('devices.actionAdd');
Route::post('/devices/ActionEdit',[App\Http\Controllers\DeviceController::class,'actionEditDevices'])->name('devices.ActionEdit');
Route::get('/{ID}/edit',[App\Http\Controllers\DeviceController::class,'formEditDevices'])->name('formEditDevices');
Route::delete('/devices/form/DeleteViewdevices/{id}',[App\Http\Controllers\DeviceController::class,'delete'])->name('Ddelete');
Route::get('/{ID?}/details',[App\Http\Controllers\DeviceController::class,'viewDetailsDevice'])->name('viewDetailsDevice');
Route::get('/imageAdd/{id?}',[App\Http\Controllers\DeviceController::class,'formAddImage'])->name('image.add');
Route::post('/imageAddAction',[App\Http\Controllers\DeviceController::class,'addImageForDevice'])->name('actionImage');
Route::delete('/DeleteItemImagedevices/{id}',[App\Http\Controllers\DeviceController::class,'deleteImage'])->name('DImagedelete');
Route::post('/ActionEditImageMain/{id}',[App\Http\Controllers\DeviceController::class,'actionEditImageMain'])->name('devices.ActionEditImageMain');

// Reviews    deleteImage
Route::get('/reviews/view/',[App\Http\Controllers\ReviewsController::class,'view'])->name('Reviews.view');
// Traffic   
Route::get('/user/view/',[App\Http\Controllers\UserController::class,'view'])->name('user.view');
Route::delete('/user/form/DeleteUser/{id}',[App\Http\Controllers\UserController::class,'delete'])->name('Ddelete');
// Images  
Route::get('/imageDevice/view/',[App\Http\Controllers\ImageController::class,'view'])->name('images.view');


