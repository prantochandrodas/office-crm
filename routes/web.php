<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\ContactClientController;
use App\Http\Controllers\Backend\ConversationLogController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\NonProspectiveClientController;
use App\Http\Controllers\Backend\OurClientController;
use App\Http\Controllers\Backend\PrimaryClientController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\WantedClientController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {


    // Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    // Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    // Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    // Route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    // Route::put('permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    // Route::delete('permissions/distroy/{id}', [PermissionController::class, 'distroy'])->name('permissions.distroy');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('application', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('application/update/{id}', [ApplicationController::class, 'update'])->name('applications.update');

    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::put('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role/distroy/{id}', [RoleController::class, 'distroy'])->name('role.distroy');
    Route::get('role/add-permission/{id}', [RoleController::class, 'addPermissionToRole'])->name('role.add-permission');
    Route::put('role/give-permission/{id}', [RoleController::class, 'givePermissionToRole'])->name('role.give-permission');


    Route::get('user', [UserController::class, 'indexPage'])->name('user.index');
    Route::get('user/getdata', [UserController::class, 'getdata'])->name('user.getdata');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('user/distroy/{id}', [UserController::class, 'distroy'])->name('user.distroy');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/project', [ProjectController::class, 'index'])->name('projectes');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('projectes.create');
    Route::get('/project/getdata', [ProjectController::class, 'getdata'])->name('projectes.getdata');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('projectes.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projectes.edit');
    Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('projectes.update');
    Route::delete('/project/distroy/{id}', [ProjectController::class, 'distroy'])->name('projectes.distroy');
    // Fetch districts based on division
    Route::get('/get-districts/{division_id}', [ProjectController::class, 'getDistricts'])->name('get.districts');
    Route::get('/get-locations/{district_id}', [ProjectController::class, 'getLocations'])->name('get.locations');
 
    Route::post('/mail-client', [MailController::class, 'sendMail'])->name('mail.client');
    Route::get('/send-mail',[MailController::class,'index'])->name('send-mail');
    Route::post('/send-mail/multipleMail', [MailController::class, 'multipleMail'])->name('send.multipleMail');
    
    
    Route::get('/send-sms', [SmsController::class, 'index'])->name('send.sms');
    Route::post('/sms-client', [SmsController::class, 'sendSms'])->name('sms-clients');
    Route::post('/send-mail/multipleSms', [SmsController::class, 'multipleSms'])->name('send.multipleSms');

    Route::get('/primary-client', [PrimaryClientController::class, 'index'])->name('primary-clients');
    Route::get('/primary-client/getdata', [PrimaryClientController::class, 'getdata'])->name('primary-clients.getdata');
    Route::get('/primary-client/edit/{id}', [PrimaryClientController::class, 'edit'])->name('primary-clients.edit');
    Route::put('/primary-client/update/{id}', [PrimaryClientController::class, 'update'])->name('primary-clients.update');
    Route::delete('/primary-client/distroy/{id}', [PrimaryClientController::class, 'distroy'])->name('primary-clients.distroy');



    Route::get('/all-client', [CustomerController::class, 'index'])->name('all-clients');
    Route::get('/all-client/getdata', [CustomerController::class, 'getdata'])->name('all-clients.getdata');
    Route::get('/all-client/edit/{id}', [CustomerController::class, 'edit'])->name('all-clients.edit');
    Route::put('/all-client/update/{id}', [CustomerController::class, 'update'])->name('all-clients.update');
    Route::delete('/all-client/distroy/{id}', [CustomerController::class, 'distroy'])->name('all-clients.distroy');
    Route::get('/all-client/create', [CustomerController::class, 'create'])->name('all-clients.create');
    Route::post('/all-client/store', [CustomerController::class, 'store'])->name('all-clients.store');
    Route::get('/get-customer-data/{id}', [CustomerController::class, 'getCustomerData']);
    Route::get('/get-projects/{serviceCategoryId}', [CustomerController::class, 'getProjects']);
    Route::get('/get-client-email/{id}', [CustomerController::class, 'getClientEmail'])->name('get.client.email');
    Route::get('/get-client/{id}', [CustomerController::class, 'getClient'])->name('get.client');
    Route::get('/customers/filter', [CustomerController::class, 'filterCustomers'])->name('customers.filter');

   

    Route::get('/get-client-details/{id}', [CustomerController::class, 'getClientDetails']);

    Route::get('/contact-client', [ContactClientController::class, 'index'])->name('contact-clients');
    Route::get('/contact-client/getdata', [ContactClientController::class, 'getdata'])->name('contact-clients.getdata');
    Route::post('/contact-client/store', [ContactClientController::class, 'store'])->name('contact-clients.store');
    Route::get('/contact-client/edit/{id}', [ContactClientController::class, 'edit'])->name('contact-clients.edit');
    Route::put('/contact-client/update/{id}', [ContactClientController::class, 'update'])->name('contact-clients.update');
    Route::delete('/contact-client/distroy/{id}', [ContactClientController::class, 'distroy'])->name('contact-clients.distroy');

    Route::get('/service-category', [ServiceCategoryController::class, 'index'])->name('service-categories');
    Route::get('/service-category/create', [ServiceCategoryController::class, 'create'])->name('service-categories.create');
    Route::get('/service-category/getdata', [ServiceCategoryController::class, 'getdata'])->name('service-categories.getdata');
    Route::post('/service-category/store', [ServiceCategoryController::class, 'store'])->name('service-categories.store');
    Route::get('/service-category/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('service-categories.edit');
    Route::put('/service-category/update/{id}', [ServiceCategoryController::class, 'update'])->name('service-categories.update');
    Route::delete('/service-category/distroy/{id}', [ServiceCategoryController::class, 'distroy'])->name('service-categories.distroy');

    Route::get('/non-prospective-client', [NonProspectiveClientController::class, 'index'])->name('non-prospective-clients');
    Route::get('/non-prospective-client/getdata', [NonProspectiveClientController::class, 'getdata'])->name('non-prospective-clients.getdata');
    Route::post('/non-prospective-client/store', [NonProspectiveClientController::class, 'store'])->name('non-prospective-clients.store');
    Route::get('/non-prospective-client/edit/{id}', [NonProspectiveClientController::class, 'edit'])->name('non-prospective-clients.edit');
    Route::put('/non-prospective-client/update/{id}', [NonProspectiveClientController::class, 'update'])->name('non-prospective-clients.update');
    Route::delete('/non-prospective-client/distroy/{id}', [NonProspectiveClientController::class, 'distroy'])->name('non-prospective-clients.distroy');

    Route::get('/wanted-client', [WantedClientController::class, 'index'])->name('wanted-clients');
    Route::get('/wanted-client/getdata', [WantedClientController::class, 'getdata'])->name('wanted-clients.getdata');
    Route::post('/wanted-client/store', [WantedClientController::class, 'store'])->name('wanted-clients.store');
    Route::get('/wanted-client/edit/{id}', [WantedClientController::class, 'edit'])->name('wanted-clients.edit');
    Route::put('/wanted-client/update/{id}', [WantedClientController::class, 'update'])->name('wanted-clients.update');
    Route::delete('/wanted-client/distroy/{id}', [WantedClientController::class, 'distroy'])->name('wanted-clients.distroy');

    Route::get('/our-client', [OurClientController::class, 'index'])->name('our-clients');
    Route::get('/our-client/getdata', [OurClientController::class, 'getdata'])->name('our-clients.getdata');
    Route::post('/our-client/store', [OurClientController::class, 'store'])->name('our-clients.store');
    Route::get('/our-client/edit/{id}', [OurClientController::class, 'edit'])->name('our-clients.edit');
    Route::put('/our-client/update/{id}', [OurClientController::class, 'update'])->name('our-clients.update');
    Route::delete('/our-client/distroy/{id}', [OurClientController::class, 'distroy'])->name('our-clients.distroy');

    Route::post('/client/{id}/update-status', [CustomerController::class, 'updateStatus'])->name('client.updateStatus');

    Route::get('/conversation-log', [ConversationLogController::class, 'index'])->name('conversation-logs');
    Route::get('/conversation-log/create', [ConversationLogController::class, 'create'])->name('conversation-logs.create');
    Route::get('/conversation-log/getdata', [ConversationLogController::class, 'getdata'])->name('conversation-logs.getdata');
    Route::post('/conversation-log/store', [ConversationLogController::class, 'store'])->name('conversation-logs.store');
    Route::get('/conversation-log/edit/{id}', [ConversationLogController::class, 'edit'])->name('conversation-logs.edit');
    Route::put('/conversation-log/update/{id}', [ConversationLogController::class, 'update'])->name('conversation-logs.update');
    Route::delete('/conversation-log/distroy/{id}', [ConversationLogController::class, 'distroy'])->name('conversation-logs.distroy');
    Route::get('/get-conversationLog/{id}', [ConversationLogController::class, 'getConversationlog'])->name('conversation-logs.getConversationlog');
    Route::get('/assigned/project/{id}', [ConversationLogController::class, 'getAssignedProject'])->name('conversation-logs.getAssignedProject');
    Route::get('/search/customers', [CustomerController::class, 'search'])->name('customers.search');

    Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');


    Route::get('/division', [DivisionController::class, 'index'])->name('divisions');
    Route::get('/division/create', [DivisionController::class, 'create'])->name('divisions.create');
    Route::get('/division/getdata', [DivisionController::class, 'getdata'])->name('divisions.getdata');
    Route::post('/division/store', [DivisionController::class, 'store'])->name('divisions.store');
    Route::get('/division/edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::put('/division/update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
    Route::delete('/division/distroy/{id}', [DivisionController::class, 'distroy'])->name('divisions.distroy');

    Route::get('/district', [DistrictController::class, 'index'])->name('districts');
    Route::get('/district/create', [DistrictController::class, 'create'])->name('districts.create');
    Route::get('/district/getdata', [DistrictController::class, 'getdata'])->name('districts.getdata');
    Route::post('/district/store', [DistrictController::class, 'store'])->name('districts.store');
    Route::get('/district/edit/{id}', [DistrictController::class, 'edit'])->name('districts.edit');
    Route::put('/district/update/{id}', [DistrictController::class, 'update'])->name('districts.update');
    Route::delete('/district/distroy/{id}', [DistrictController::class, 'distroy'])->name('districts.distroy');

    Route::get('/location', [LocationController::class, 'index'])->name('locations');
    Route::get('/location/create', [LocationController::class, 'create'])->name('locations.create');
    Route::get('/location/getdata', [LocationController::class, 'getdata'])->name('locations.getdata');
    Route::post('/location/store', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/location/update/{id}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/location/distroy/{id}', [LocationController::class, 'distroy'])->name('locations.distroy');
    Route::get('/get-district/{id}', [LocationController::class, 'getDistrict'])->name('locations.getDistrict');
});
