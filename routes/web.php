<?php
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\FrontLoginController;
use App\Http\Livewire\AccessModel;
use App\Http\Livewire\AccessPoint;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\FrontContact;
use App\Http\Livewire\FrontHome;
use App\Http\Livewire\FrontService;
use App\Http\Livewire\Permission;
use App\Http\Livewire\Users;
use App\Http\Livewire\UserType;
use App\Http\Livewire\UserView;

use App\Http\Livewire\WhyUs;
use App\Http\Livewire\HomeCustomerReview;
use App\Http\Livewire\BookNow;
use App\Http\Livewire\FAQ;
use App\Http\Livewire\Direction;
use App\Http\Livewire\TermsCondition;
use App\Http\Livewire\LogIn;
use App\Http\Livewire\CustomerRegister;

#admin
use App\Http\Livewire\Complain;
use App\Http\Livewire\Customer;
use App\Http\Livewire\OfferComponent;
use App\Http\Livewire\RateComponent;
use App\Http\Livewire\CustomerReviewComponent;
use App\Http\Livewire\BookingComponent;


use Illuminate\Support\Facades\Route;

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
Route::get('/admin', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/customer-login', [LoginController::class, 'customerLogin']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/customer-logout', [LoginController::class, 'customerLogout'])->name('customer-logout');

#front
Route::get('/', FrontHome::class)->name('home');
Route::get('/service', FrontService::class)->name('service');
Route::get('/why-us', WhyUs::class)->name('why-us');
Route::get('/testimonial', HomeCustomerReview::class)->name('testimonial');
Route::get('/contact', FrontContact::class)->name('contact');
Route::get('/booknow/{customerId}/{start_date}/{end_date}', BookNow::class)->name('booknow');
Route::get('/faq', FAQ::class)->name('faq');
Route::get('/direction', Direction::class)->name('direction');
Route::get('/terms', TermsCondition::class)->name('terms');
Route::get('/registration', CustomerRegister::class)->name('registration');
Route::get('/flogin', LogIn::class)->name('flogin');


//admin
Route::group(['middleware'=>['auth','access']],function(){
// Route::group(['middleware'=>['auth']],function(){
Route::get('/user-type', UserType::class)->name('user-type');
Route::get('/access-model', AccessModel::class)->name('access-model');
Route::get('/access-point/{id}', AccessPoint::class)->name('access-point');
Route::get('/permission/{id}', Permission::class)->name('permission');
Route::get('/users', Users::class)->name('users');
Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/complain', Complain::class)->name('complain');
Route::get('/customer', Customer::class)->name('customer');
Route::get('/offer', OfferComponent::class)->name('offer');
Route::get('/rate', RateComponent::class)->name('rate');
Route::get('/customerreview', CustomerReviewComponent::class)->name('customerreview');
Route::get('/booking', BookingComponent::class)->name('booking');

});

