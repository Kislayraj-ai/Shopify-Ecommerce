<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CPHController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RazorPayController;
use App\Http\Controllers\UsersDetailsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//! user Routes
Route::controller(UsersDetailsController::class) ->group(function(){
    Route::get('/' , 'openLoginPage') ->name('openLoginPage');
    Route::post('loginUerWithAuthentication' , 'loginUerWithAuthentication')->name('login.Authentication') ;
    Route::get('logoutUer' , 'logoutUer')->name('logout.userLogout') ;
    Route::post('newUserRegistration' , 'newUserRegistration')->name('user.newUserRegistration') ;
    Route::get('HomePage' , 'openHomePage')->name('HomePage') ;
    
    //# CPH User Routes
    Route::get('manageUser' , 'openManageUser' )->name('user.manageUser');
    Route::get('getUsersList' , 'getAllUsersListForAdmin' )->name('user.getAllUsersList');
    Route::get('getSingleUserById' , 'getSingleUserById')->name('user.GetSingleUserById') ;
});

//! create a Excel Sheet Downloadable 
Route::controller(ExcelController::class)->group(function()  {
    Route::get('exportUsersList', 'exportUsersList')->name('excel.exportUsersList');
    Route::get('exportProductList', 'exportProductList')->name('excel.exportProductList');
}) ;



//! Home Routes
Route::controller(HomeProductController::class)->group(function(){

Route::get('singleCategory/{id}' , 'singleCategoryProduct' )->name('singleCategory') ;
});



//! CPH routes

Route::controller(CPHController::class)->group(function(){
    Route::get("/cphLogin", 'cphLoginUser')->name('cphLogin');
    Route::post("/cphUserAuthentication", 'cphUserAuthentication')->name('cphUserAuthentication');
    Route::get("cph_dashboard", 'cphDashboard')->name('cph_dashboard');
    Route::get("cphUserLogout", 'cphUserLogout')->name('logout.cphUserLogout');
});



//! single category home 


//! category manager
Route::controller(categoryController::class)->group(function(){
Route::get('/addCategories', 'addCategories')->name('category.addCategories') ;
Route::get('/createCategories', 'createCategory')->name('category.createCategories') ;
Route::get('/manageCategories', 'managecreateCategory')->name('category.manageCategory') ;
Route::get('getCategoryById', 'getCategoryById')->name('getCategoryById') ;
Route::post('updateCategoryById', 'updateCategoryById')->name('updateCategoryById') ;
Route::post('frezeCategorybyId', 'frezeCategorybyId')->name('frezeCategorybyId') ;
Route::get('getAllCategoryListingForMapping' ,'getAllCategoryListingForMapping')->name('category.getAllCategoryListingForMapping');
Route::get('getAllCategoryMappingOneImage' ,'getAllCategoryMappingOneImage')->name('category.getAllCategoryMappingOneImage');

});


//! product manager
Route::controller(ProductController::class)->group(function(){
Route::get('openCreateProduct','openCreateProduct')->name('product.openCreateProduct') ;
Route::post('addProductData' ,'addProductData')->name('product.addProductDataFromCPH');
Route::get('manageProducts' ,'manageProducts')->name('product.manageAllProducts');
Route::get('manageProductCategorymapping' ,'manageProductCategorymapping')->name('product.product_category_mapping');
Route::get('getAllProductsListingForMapping' ,'getAllProductsListingForMapping')->name('product.getAllProductsListingForMapping');
Route::post('insertProductCategoryMapping' ,'insertProductCategoryMapping')->name('product.insertProductCategoryMapping');
Route::get('showSingleProductDetail/{id}' ,'showSingleProductDetail')->name('product.showSingleProductDetail');
Route::get('create_product_stocks' ,'createProductStocks')->name('product.create_product_stocks');
Route::post('add_product_quantity' ,'addProductQuantity')->name('product.add_product_quantity');
Route::get('getAllProducts' ,'getAllProducts')->name('product.getAllProducts');
Route::get('viewProductList' ,'viewProductList')->name('product.viewProductList');
Route::get('getProductListData' ,'getProductListData')->name('product.getProductListData');
Route::post('checkQuantity' ,'checkQuantity')->name('product.checkQuantity');

});


//! cart 
Route::controller(CartController::class)->group(function(){
Route::get('openCartView' ,'openCartView')->name('cart.openCart') ;
Route::post('addPoriductToCart' ,'addProductToCart')->name('cart.addPoriductToCart') ;
Route::get('fetchCartData' ,'fetchCartData')->name('cart.fetchCartData') ;
Route::post('increaseProductQuantity' ,'increaseProductQuantity')->name('cart.increaseProductQuantity') ;
Route::post('removeProductQuantity' ,'removeProductQuantity')->name('cart.removeProductQuantity') ;

});


//!RazorPay payment 
Route::controller(RazorPayController::class)->group(function(){
    Route::post('makeOrderPayment',"makeOrderCheckout")->name('razor.MakeOrderCheckout');
    Route::get('makePaymentBilling',"makePaymentBilling")->name('Cart.MakePaymentBilling');
    Route::post('successPaymentMade',"successPaymentMade")->name('razor.success');
    Route::post('successPaymentDone' , 'successPaymentDone')->name('razor.successPaymentDone');
    // Route::get('response' , 'successPaymentDone')->name('razor.successPaymentDone');


});