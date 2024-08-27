<?php

use Illuminate\Support\Facades\Route;
Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'doLogin'])->name('doLogin');

Route::prefix('/')->group(function(){
    Route::get('/',[\App\Http\Controllers\frontend\Frontendcontroller::class,'index'])->name('index');
    Route::get('/categories/{category_id}', [\App\Http\Controllers\frontend\Frontendcontroller::class, 'webCategory'])->name('wb.cat');
    Route::get('/news/{news_id}', [\App\Http\Controllers\frontend\Frontendcontroller::class, 'newsDetails'])->name('wb.news');
    Route::get('/contact',[\App\Http\Controllers\frontend\Frontendcontroller::class,'webContact'])->name('index');
    Route::resource('/comment',\App\Http\Controllers\frontend\CommentController::class);
    Route::resource('/visitor_login',\App\Http\Controllers\VisitorLoginController::class);
    Route::post('/visitor_do_login', [\App\Http\Controllers\VisitorLoginController::class, 'visitor_do_login'])->name('visitor_do_login');


    Route::get('lang/change', [\App\Http\Controllers\LangController::class, 'change'])->name('changeLang');
    Route::get('/admin_comment', [App\Http\Controllers\frontend\CommentController::class, 'commentList'])->name('admin_comment');
});




Route::prefix('admin')->middleware('authChak')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[\App\Http\Controllers\Dashboardcontroller::class,'dashboard'])->name('dashboard');

    //    Category_section
    Route::get('/category',[\App\Http\Controllers\CategoryController::class,'category'])->name('cat.list');
    Route::get('/category/add',[\App\Http\Controllers\CategoryController::class,'create'])->name('cat.add');
    Route::post('/category/add',[\App\Http\Controllers\CategoryController::class,'store'])->name('cat.submit');
    Route::get('/category/edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('cat.edit');
    Route::post('/category/edit',[\App\Http\Controllers\CategoryController::class,'update'])->name('cat.update');
    Route::get('/delete/{id}',[\App\Http\Controllers\CategoryController::class,'delete'])->name('cat.delete');

    //    Dashboard_Section
    Route::get('/news',[\App\Http\Controllers\Dashboardcontroller::class,'news'])->name('news');
    Route::get('/news_fit',[\App\Http\Controllers\Dashboardcontroller::class,'news_fit'])->name('news_fit');
//    Route::get('/contact',[\App\Http\Controllers\Dashboardcontroller::class,'contact'])->name('contact');
    Route::get('/widgets',[\App\Http\Controllers\Dashboardcontroller::class,'widgets'])->name('widgets');
    Route::get('/subminu',[\App\Http\Controllers\Dashboardcontroller::class,'subminu'])->name('subminu');
    Route::get('/subminu2',[\App\Http\Controllers\Dashboardcontroller::class,'subminu2'])->name('subminu2');
    Route::get('/tasks',[\App\Http\Controllers\Dashboardcontroller::class,'Tasks'])->name('tasks');
    Route::get('/charts',[\App\Http\Controllers\Dashboardcontroller::class,'charts'])->name('charts');
//    Route::get('/login',[\App\Http\Controllers\Dashboardcontroller::class,'Login'])->name('login');
    Route::get('/Calender',[\App\Http\Controllers\Dashboardcontroller::class,'Calender'])->name('calender');


    Route::get('/admin_catelist',[\App\Http\Controllers\CategoryController::class,'CateList'])->name('admin_catelist');
    Route::get('/admin_cateCreate',[\App\Http\Controllers\CategoryController::class,'CateCreate'])->name('admin_catecreate');

//     news_create section
    Route::resource('news',\App\Http\Controllers\NewsController::class);
});