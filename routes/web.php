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

Route::get('/home', function () {
    return view('welcome');
});




Route::get('/', 'UIController@index')->name('UI.index');




Route::group(['prefix' => 'admin', 'moddleware' => 'auth'], function(){



    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get("dashboard", "DashboardController@index")->name("dashboard.index");






    // Users
    Route::get("user/users", "userController@index")->name("users.index");
    Route::get("user/addUser", "userController@create")->name("users.addUser");
    Route::POST("user/store", "userController@store")->name("users.store");
    Route::get("user/editUser/{id}", "userController@edit")->name("users.edit");
    Route::POST("user/update/{id}", "userController@update")->name("users.update");
    // For store All student Deleted
    Route::get('user/trashed', 'UserController@trashed')->name('user.trashed');
    // For Restor student
    Route::get('user/restore/{id}', 'UserController@restore')->name('user.restore');
    // For Final Delete student
    Route::get('user/hdelete/{id}', 'UserController@hdelete')->name('user.hdelete');
    Route::get('user/deleteUser/{id}', 'UserController@destroy')->name('user.deleteUser');




    // slider

    Route::get("slider/sliders", "SliderController@index")->name("slider.index");
    Route::get("slider/addSlider", "SliderController@create")->name("slider.addSlider");
    Route::POST("slider/storeSlider", "SliderController@store")->name("slider.store");
    Route::get("slider/editSlider/{id}", "SliderController@edit")->name("slider.edit");
    Route::POST("slider/updateSlider/{id}", "SliderController@update")->name("slider.update");
    // For store All student Deleted
    Route::get('slider/trashed', 'SliderController@trashed')->name('slider.trashed');
    // For Restor student
    Route::get('slider/restore/{id}', 'SliderController@restore')->name('slider.restore');
    // For Final Delete student
    Route::get('slider/hdelete/{id}', 'SliderController@hdelete')->name('slider.hdelete');
    Route::get('slider/deleteSlider/{id}', 'SliderController@destroy')->name('slider.deleteSlider');





    // Category

    Route::get("category/categories", "CategoryController@index")->name("category.index");
    Route::get("category/addCategory", "CategoryController@create")->name("category.addCategory");
    Route::POST("category/storeCategory", "CategoryController@store")->name("category.store");
    Route::get("category/editCategory/{id}", "CategoryController@edit")->name("category.edit");
    Route::POST("category/updateCategory/{id}", "CategoryController@update")->name("category.update");
    // For store All student Deleted
    Route::get('category/trashed', 'CategoryController@trashed')->name('category.trashed');
    // For Restor student
    Route::get('category/restore/{id}', 'CategoryController@restore')->name('category.restore');
    // For Final Delete student
    Route::get('category/hdelete/{id}', 'CategoryController@hdelete')->name('category.hdelete');
    Route::get('category/deleteCategory/{id}', 'CategoryController@destroy')->name('category.deleteCategory');





    // Item

    Route::get("item/items", "ItemController@index")->name("item.index");
    Route::get("item/addItem", "ItemController@create")->name("item.addItem");
    Route::POST("item/storeItem", "ItemController@store")->name("item.store");
    Route::get("item/editItem/{id}", "ItemController@edit")->name("item.edit");
    Route::POST("item/updateItem/{id}", "ItemController@update")->name("item.update");
    // For store All student Deleted
    Route::get('item/trashed', 'ItemController@trashed')->name('item.trashed');
    // For Restor student
    Route::get('item/restore/{id}', 'ItemController@restore')->name('item.restore');
    // For Final Delete student
    Route::get('item/hdelete/{id}', 'ItemController@hdelete')->name('item.hdelete');
    Route::get('item/deleteItem/{id}', 'ItemController@destroy')->name('item.deleteItem');







    // Reservation الحجوزات

    Route::get("reservation/reservations", "ReservationController@index")->name("reservation.index");
    Route::POST("reservation/storeReservation", "ReservationController@store")->name("reservation.store");

    Route::get("reservation/Cconfirm/{id}", "ReservationController@confirm")->name("reservation.confrimed");
    Route::get("reservation/notCconfirm/{id}", "ReservationController@notCconfirm")->name("reservation.notConfrimed");

    

    // For store All student Deleted
    Route::get('reservation/trashed', 'ReservationController@trashed')->name('reservation.trashed');
    // For Restor student
    Route::get('reservation/restore/{id}', 'ReservationController@restore')->name('reservation.restore');
    // For Final Delete student
    Route::get('reservation/hdelete/{id}', 'ReservationController@hdelete')->name('reservation.hdelete');
    Route::get('reservation/deleteReservation/{id}', 'ReservationController@destroy')->name('reservation.deleteReservation');





    // Contacts ألتواصل



    Route::get("contact/contacts", "ContactController@index")->name("contact.index");
    Route::POST("contact/storeContact", "ContactController@store")->name("contact.store");

    Route::get('contact/trashed', 'ContactController@trashed')->name('contact.trashed');
    // For Restor student
    Route::get('contact/restore/{id}', 'ContactController@restore')->name('contact.restore');
    // For Final Delete student
    Route::get('contact/hdelete/{id}', 'ContactController@hdelete')->name('contact.hdelete');
    Route::get('contact/deleteContact/{id}', 'ContactController@destroy')->name('contact.deleteContact');





    


// settings
    Route::get("setting/settings", "settingController@index")->name("setting.index");
    Route::get("setting/addSetting", "settingController@create")->name("setting.addSetting");
    Route::POST("setting/store", "settingController@store")->name("setting.store");
    Route::get("setting/editSetting/{id}", "settingController@edit")->name("setting.edit");
    Route::POST("setting/update/{id}", "settingController@update")->name("setting.update");

    Route::get('setting/deleteSetting/{id}', 'settingController@destroy')->name('setting.deleteSetting');









});
