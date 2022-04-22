<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\VNPAYController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ScheduleController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role) {
        switch (Auth::user()->role) {
            case '1':
                return redirect('/admin/dashboard');
            case '2':
                return redirect('admin/schedule');
            case '3':
                return redirect('/admin/storage');
            case '4':
                return redirect('/');
        }
    } else {
        return redirect('/');
    }
})->name('dashboard');

Route::get('/error/permission', [ErrorController::class, 'viewErrorPermission']);
Route::get('/error/status', [ErrorController::class, 'viewErrorStatus']);

Route::group(['prefix' => 'admin', 'middleware' => ['permission.admin.page']], function () {
    Route::group(['middleware' => ['permission.admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'viewDashBoard'])->name('admin.home');
        Route::get('/export', [AdminController::class, 'export'])->name('admin.export');
        Route::get('/getanalystorder', [AdminController::class, 'getAnalystOrder']);
        Route::get('/getdataanalysis', [AdminController::class, 'getDataAnalysis']);
        Route::get('/change-status-code', [AdminController::class, 'changeStatusCode'])->name('change.status.code');
        Route::get('/get-detail-order', [AdminController::class, 'getDetailOrder']);

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/add', [UserController::class, 'createUser'])->name('admin.create.user');
            Route::get('/update/{user}', [UserController::class, 'viewUpdateUser'])->name('admin.update.user.view');
            Route::post('/update/{user}', [UserController::class, 'updateUser'])->name('admin.update.user');
            Route::post('/store', [UserController::class, 'storeUser'])->name('admin.store.user');
            Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('admin.delete.user');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'listProductAdmin'])->name('admin.products.index');
            Route::get('/add', [ProductController::class, 'createProduct'])->name('admin.create.products');
            Route::get('/update/{product}', [ProductController::class, 'viewUpdateProduct'])->name('admin.update.products.view');
            Route::post('/update/{product}', [ProductController::class, 'updateProduct'])->name('admin.update.products');
            Route::post('/store', [ProductController::class, 'storeProduct'])->name('admin.store.products');
            Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.delete.products');
        });

        Route::group(['prefix' => 'service'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
            Route::get('/add', [ServiceController::class, 'createService'])->name('admin.create.service');
            Route::post('/store', [ServiceController::class, 'storeService'])->name('admin.store.service');
            Route::get('/update/{service}', [ServiceController::class, 'viewUpdateService'])->name('admin.update.service.view');
            Route::post('/update/{service}', [ServiceController::class, 'updateService'])->name('admin.update.service');
            Route::get('/delete/{id}', [ServiceController::class, 'deleteService'])->name('admin.delete.service');
        });

        Route::group(['prefix' => 'promotion'], function () {
            Route::get('/', [AdminController::class, 'promotionView'])->name('admin.promotion.index');
            Route::post('/add', [AdminController::class, 'addPromotion'])->name('admin.create.promotion');
            Route::get('/delete', [AdminController::class, 'deletePromotion'])->name('admin.delete.promotion');
        });
    });

    Route::group(['middleware' => ['permission.admin.doctor']], function () {
        Route::get('/get-info-schedule', [AdminController::class, 'getInforSchedule']);
        Route::get('/send-email-schedule', [MailController::class, 'scheduleMail'])->name('mail.schedule');
        Route::get('/print-preview', [AdminController::class, 'printPreview']);
        Route::get('/store-invoice-doctor', [AdminController::class, 'storeInvoiceDoctor']);
        Route::group(['prefix' => 'schedule'], function () {
            Route::get('/', [ScheduleController::class, 'index'])->name('admin.schedule.index');
            Route::get('/edit/status', [ScheduleController::class, 'editStatus'])->name('admin.status.schedule');
        });
    });

    Route::group(['middleware' => ['permission.admin.employee']], function () {
        Route::group(['prefix' => 'storage'], function () {
            Route::get('/', [StorageController::class, 'index'])->name('admin.storage.index');
            Route::get('/add', [StorageController::class, 'createStorage'])->name('admin.create.storage');
            Route::post('/store', [StorageController::class, 'storeStorage'])->name('admin.store.storage');
            Route::get('/store-history', [StorageController::class, 'historyStorage'])->name('admin.history.storage');
            Route::get('/export-storage', [StorageController::class, 'viewExportStorage'])->name('admin.export.storage');
            Route::post('/exported', [StorageController::class, 'exportStorage'])->name('admin.exported.storage');
            Route::group(['middleware' => ['permission.admin']], function () {
                Route::get('/edit/status', [StorageController::class, 'editStatus'])->name('admin.status.storage');
            });
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('/', [AdminController::class, 'orderView'])->name('admin.order.index');
            Route::get('/edit/status', [AdminController::class, 'editStatusOrder'])->name('admin.status.order');
        });
    });

    Route::group(['prefix' => 'doctor', 'middleware' => ['permission.doctor']], function () {
        Route::get('/', [AdminController::class, 'doctorView'])->name('admin.doctor.index');
    });
});

Route::group(['middleware' => ['permission.visiter']], function () {
    Route::get('/', [FeatureController::class, 'viewWelcome']);
    Route::get('/contact', [FeatureController::class, 'viewContact']);
    Route::get('/send-contact', [FeatureController::class, 'sendContact']);
    Route::get('/about', [FeatureController::class, 'viewAbout']);
    Route::get('/blog', [FeatureController::class, 'viewBlog']);
    Route::get('/service', [FeatureController::class, 'viewService']);
    Route::get('/profile', [FeatureController::class, 'viewProfile']);
    Route::get('/history', [FeatureController::class, 'viewHistory']);
    Route::post('/change-password', [FeatureController::class, 'changePassword']);
    Route::get('/invoice', [FeatureController::class, 'invoice']);
    Route::get('/send-email', [MailController::class, 'index'])->name('mail.invoice');
    Route::post('/input-code', [FeatureController::class, 'inputCode'])->name('input.promotion.code');
    Route::get('/invoice-check', [FeatureController::class, 'lastInvoice'])->name('last.invoice');
    Route::post('/update-profile', [FeatureController::class, 'updateProfile']);

    Route::get('/product', [ProductController::class, 'productList'])->name('products.list');
    Route::post('/products-search', [ProductController::class, 'productSearch'])->name('products.search');
    Route::get('/products-detail', [ProductController::class, 'productDetail'])->name('products.detail');
    Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::get('/confirm-order', [FeatureController::class, 'viewConfirmOrder']);
    Route::post('/create-pay', [VNPAYController::class, 'createPay'])->name('create.pay');
    Route::post('/payment-process', [VNPAYController::class, 'paymentProcess']);
    Route::get('/payment-return', [VNPAYController::class, 'paymentReturn']);
    Route::get('/payment-fail', [VNPAYController::class, 'paymentFail']);

    Route::group(['middleware' => ['permission.users']], function () {
        Route::get('/schedule', [ScheduleController::class, 'viewSchedule']);
        Route::post('/schedule-book', [ScheduleController::class, 'bookSchedule'])->name('schedule.book');
        Route::get('/schedule-confirmed', [ScheduleController::class, 'viewScheduleConfirmed'])->name('schedule.confirmed');
    });
});
