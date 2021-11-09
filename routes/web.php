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


Route::get('/', 'visitor\VisitorController@index')->name('visitorHome');

Route::get('/event', 'visitor\Visitorcontroller@events');

Route::post('/event', 'visitor\Visitorcontroller@searchevents')->name('searchEvents');
Route::get('/eventsNotifications', 'visitor\Visitorcontroller@allEvents');

Route::get('/about', function(){
    
    return view('visitor.about')
        ->with('title', 'About Us')
    ;
});



Route::get('transferApproval' , 'member\TransferController@transferApproval')->name('transferApproval');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// manage accounts routes 
Route::resource('accounts', 'admin\ManageAccountsController');
    //disable account
    Route::get('disableAccount/{id}', 'admin\ManageAccountsController@disable')->name('disableAccount');


// Transfer routes 
Route::resource('transfer', 'member\TransferController');

// Reports
Route::get('report', 'ReportController@index')->name('report');
Route::post('report', 'ReportController@retrieve')->name('report');

// UserGroups
Route::get('userGroups',  'member\UserGroupsController@index')->name('userGroups');

Route::post('userGroups',  'member\UserGroupsController@store')->name('userGroupsStore');

Route::get('removeUserGroups/{id}',  'member\UserGroupsController@remove')->name('userGroupsRemove');



// broadcast and notifcations routes

Route::resource('broadcast', 'admin\BroadcastController');
    // get route for getting notifications wiith javascript
    Route::get('get_notifications', 'admin\BroadcastController@getNotification')->name('get_nots');
    Route::get('deleteNotifification/{id}', 'admin\BroadcastController@destroy')->name('deleteNotification');

    Route::get('ApproveNotifification/{id}', 'admin\BroadcastController@approve')->name('approveNotification');
    
// sacraments
    // wedding
    Route::resource('wedding', 'member\WeddingController');

    // wedding
    Route::resource('baptism', 'member\BaptismController');

    // confirmation
    Route::resource('confirmation', 'member\ConfirmationController');

// Group
Route::resource('group', 'admin\GroupController');
Route::resource('supervisor', 'admin\SupervisorController');

// calender
Route::resource('calender', 'admin\CalenderController');
    Route::get('deleteCalender/{id}', 'admin\CalenderController@destroy')->name('deleteCalender');
    Route::get('/getcalender', 'admin\CalenderController@getCalender');
// search

Route::resource('adminSearch', 'admin\SearchController');

// payment
Route::resource('payment', 'member\PaymentController');

// outstation
Route::resource('outstationLeader', 'admin\OutstationLeaderController');
Route::resource('outstation', 'admin\OutstationController');

// user account

Route::resource('user', 'UserController');