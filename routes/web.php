<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\CartController as ControllersCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CampController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\website\ProfileController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CountryController;

use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\website\Auth\AuthController;
use App\Http\Controllers\website\Home\MainController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\website\LocalizationController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\AdvertismentController;
use App\Http\Controllers\TapController;
use App\Http\Controllers\website\Auth\ForgetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
///////////////////////////////WEBSITE////////////////////////////////////
    Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class,'loginView'])->name('login.view');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('register',[AuthController::class,'registerView'])->name('register.view');
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::get('verify',[AuthController::class,'verify'])->name('verify');
    Route::post('check-otp',[AuthController::class,'checkOtp'])->name('check-otp');
    Route::post('update-fcm',[AuthController::class,'updateFCM'])->name('update-fcm');
    // Forget Password
    Route::get('resend_otp',[ForgetPasswordController::class,'resend'])->name('resend_otp');
    Route::get('forget-password',[ForgetPasswordController::class,'index'])->name('forget-password.view');
    Route::get('forget-password/verify/{phone}',[ForgetPasswordController::class,'verifyView'])->name('verify.view');
    Route::get('change-password',[ForgetPasswordController::class,'changePasswordView'])->name('change-password.view');
    Route::get('resend-otp/{phone}',[ForgetPasswordController::class,'resend'])->name('resend-otp');
    Route::post('send-otp',[ForgetPasswordController::class,'sendOtp'])->name('send-otp');
    Route::post('forget-password/verify',[ForgetPasswordController::class,'verify'])->name('forget-password.verify');
    Route::post('change-password',[ForgetPasswordController::class,'changePassword'])->name('change-password');
   });
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/', [MainController::class,'main'])->name('home');
    Route::get('/home', [MainController::class,'home'])->name('home.main');
    Route::get('change/{lang}',[LocalizationController::class,'setLang'])->name('change-lang');
    Route::get('contact',[MainController::class,'contact'])->name('contact');
    Route::get('about',[MainController::class,'about'])->name('about');
    Route::get('terms',[MainController::class,'terms'])->name('terms');
    Route::get('/advertisment/{id}', [MainController::class , 'show'])->name('advertisment.show');

    Route::group(['middleware'=>'auth'],function(){
        Route::get('create', [MainController::class, 'create'])->name('addads');
        Route::post('create-advertisment', [MainController::class, 'storeadd'])->name('storeadd');
        Route::get('/product/{id}', [MainController::class , 'show'])->name('product.show');
        Route::get('get-category',[AdvertismentController::class,'getCategory'])->name('get-categories');
        Route::post('advertisment/store',[AdvertismentController::class,'store'])->name('ads.store');

        Route::post('/add-to-cart/{id}',   [ControllersCartController::class, 'addToCart'])->name('addToCart');
        Route::get('/cart',                [ControllersCartController::class, 'showCart'])->name('cart');
        Route::delete('/cart/{id}',        [ControllersCartController::class, 'removeItem'])->name('removeItem');
        Route::post('/paymenttap',         [TapController::class, 'paymenttap'])->name('paymenttap');
        Route::get('/callbacktap',         [TapController::class, 'callbacktap'])->name('callbacktap');

        Route::get('favourite/create',[AdvertismentController::class,'addFav'])->name('ads.fav.create');
        Route::group(['prefix'=>'profile','controller'=>ProfileController::class],function(){
            Route::get('main','index')->name('profile.main');
            Route::get('listing','listing')->name('profile.listing');
            Route::get('favourite','favouriteListing')->name('profile.favourite');
            Route::get('chat','chat')->name('profile.chat');
            Route::get('payment','payment')->name('profile.payment');
            Route::get('edit','edit')->name('profile.edit');
            Route::post('update','update')->name('profile.update');
            Route::get('delete-ads/{id}','deleteAds')->name('delete.advertisment');
            Route::get('delete-fav/{id}','deleteFav')->name('delete.advertisment.fav');
        });
    });


    Route::get('admin/login',[AdminController::class,'loginView'])->middleware('guest:admin')->name('admin.login.view');
    Route::post('admin/login',[AdminController::class,'login'])->middleware('guest:admin')->name('admin.login');
    Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('/',[HomeController::class,'index'])->name('admin');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('get-ads_type',[HomeController::class,'advertismentType'])->name('admin.get-ads_type');
    Route::get('get-ads_status',[HomeController::class,'advertismentStatus'])->name('admin.get-ads_status');
    Route::group(['prefix'=>'country','controller'=>CountryController::class],function(){
        Route::get('/','index')->name('admin.country.index');
        Route::get('edit/{id}','edit')->name('admin.country.edit');
        Route::get('delete/{id}','delete')->name('admin.country.delete');
        Route::post('update/{id}','update')->name('admin.country.update');
        Route::get('update-currency','updateCurrency')->name('admin.country.update-currency');

    });
    Route::group(['prefix'=>'category','controller'=>CategoryController::class],function(){
        Route::get('/','index')->name('admin.category.index');
        Route::get('create','create')->name('admin.category.create');
        Route::get('edit/{id}','edit')->name('admin.category.edit');
        Route::get('delete/{id}','delete')->name('admin.category.delete');
        Route::post('update/{id}','update')->name('admin.category.update');
        Route::post('store','store')->name('admin.category.store');
    });
    Route::group(['prefix'=>'banner','controller'=>BannerController::class],function(){
        Route::get('/','index')->name('admin.banner.index');
        Route::get('create','create')->name('admin.banner.create');
        Route::get('edit/{id}','edit')->name('admin.banner.edit');
        Route::get('delete/{id}','delete')->name('admin.banner.delete');
        Route::post('update/{id}','update')->name('admin.banner.update');
        Route::post('store','store')->name('admin.banner.store');
        Route::get('edit-order','updateOrder')->name('admin.banner.edit.order');

    });
    Route::group(['prefix'=>'plan','controller'=>PlanController::class],function(){
        Route::get('/','index')->name('admin.plan.index');
        Route::get('create','create')->name('admin.plan.create');
        Route::get('edit/{id}','edit')->name('admin.plan.edit');
        Route::get('delete/{id}','delete')->name('admin.plan.delete');
        Route::post('update/{id}','update')->name('admin.plan.update');
        Route::post('store','store')->name('admin.plan.store');
    });
    Route::group(['prefix'=>'admin','controller'=>AdminController::class],function(){
        Route::get('/','index')->name('admin.admin.index');
        Route::get('create','create')->name('admin.admin.create');
        Route::get('edit/{id}','edit')->name('admin.admin.edit');
        Route::get('delete/{id}','delete')->name('admin.admin.delete');
        Route::post('update/{id}','update')->name('admin.admin.update');
        Route::post('store','store')->name('admin.admin.store');
    });
    Route::group(['prefix'=>'products','controller'=>ProductController::class],function(){
        Route::get('/','index')->name('admin.product.index');
        Route::get('create','create')->name('admin.product.create');
        Route::get('edit/{id}','edit')->name('admin.product.edit');
        Route::get('delete/{id}','delete')->name('admin.product.delete');
        Route::post('update/{id}','update')->name('admin.product.update');
        Route::post('store','store')->name('admin.product.store');
    });
    Route::group(['prefix'=>'users','controller'=>UserController::class],function(){
        Route::get('/','index')->name('admin.user.index');
        Route::get('edit/{id}','edit')->name('admin.user.edit');
        Route::post('update/{id}','update')->name('admin.user.update');
        Route::get('toggle-data','toggleData')->name('admin.user.toggle');
        Route::get('show/{id}','show')->name('admin.user.show');
        Route::get('delete/{id}','delete')->name('admin.user.delete');


    });
    Route::group(['prefix'=>'advertisment','controller'=>AdvertismentController::class],function(){
        Route::get('/','index')->name('admin.advertisment.index');
        Route::get('create','create')->name('admin.advertisment.create');
        Route::post('store','store')->name('admin.advertisment.store');
        Route::get('show/{id}','show')->name('admin.advertisment.show');
        Route::get('toggle-data','toggleActive')->name('admin.advertisment.toggle');
    });
    Route::group(['prefix'=>'camps','controller'=>CampController::class],function(){
        Route::get('/','index')->name('admin.camp.index');
        Route::get('regsiteration','registration')->name('admin.camp.registration');

        Route::get('create','create')->name('admin.camp.create');
        Route::get('show/{id}','show')->name('admin.camp.show');
        Route::get('edit/{id}','edit')->name('admin.camp.edit');

        Route::get('delete/{id}','delete')->name('admin.camp.delete');

        Route::post('store','store')->name('admin.camp.store');
        Route::post('update/{id}','update')->name('admin.camp.update');
        Route::post('update-status','updateStatus')->name('admin.camp.update.status');
        Route::get('toggle-data','toggleActive')->name('admin.camp.toggle');

    });
    Route::group(['prefix'=>'order','controller'=>OrderController::class],function(){
        Route::get('/','index')->name('admin.order.index');
        Route::get('show/{id}','show')->name('admin.order.show');
    });
});

