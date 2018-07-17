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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactPageController@index');

Route::get('/about', 'AboutPageController@index');

Route::get('/sponsors', 'SponsorsPageController@index');

Route::get('/jobs', 'JobsPageController@index');
Route::get('/jobs/{sponsor}', 'JobsPageController@detail');

Route::get('/workshops', 'WorkshopsPageController@index');
Route::get('/workshops/{workshop}', 'WorkshopsPageController@detail');

Route::get('/hackathon', 'HackathonPageController@index');

Route::get('/speakers/{speaker?}/{speakerName?}', 'SpeakersPageController@index');

Route::get('/blog', 'BlogItemsPageController@index');
Route::get('/blog/{blogItem}', 'BlogItemsPageController@detail');

Route::get('/pictures', 'EventImagesPageController@index');
Route::get('/pictures/{eventImages}', 'EventImagesPageController@getImagesByEventImageGroupId');

Route::get('/videos', 'VideosPageController@index');
Route::get('/videos/{videoGroups}', 'VideosPageController@getVideosByVideoGroupId');

Route::post('/subscribe', 'MailchimpController@newsletter');

/**
 * Routes related with the timeline screen
 */
Route::get('/timeline/{hall}/{day}', 'TalksOverviewPageController@index');
Route::get('/timeline/tweets', 'TweetsController@index');

// For each Hall I create a route to redirect to the right google docs file associated
foreach (\App\Halls::all() as $hall) {
    Route::get('/'. $hall . '-doc', function () use ($hall) {
        return redirect(App\Halls::getGoogleDocRedirectByHall($hall));
    });
}

/**
 * Admin routes
*/
Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/speakers', 'Admin\SpeakersController');
    Route::post('admin/speakers/order', 'Admin\SpeakersController@order');

    Route::resource('admin/members', 'Admin\MembersController');

    Route::resource('admin/supporters', 'Admin\SupportersController');

    Route::resource('admin/workshops', 'Admin\WorkshopsController');
    Route::post('admin/workshops/order', 'Admin\WorkshopsController@order');

    Route::resource('admin/sponsors', 'Admin\SponsorsController');
    Route::resource('admin/sponsors-groups', 'Admin\SponsorsGroupsController');
    Route::post('admin/sponsors-groups/order', 'Admin\SponsorsGroupsController@order');

    Route::resource('admin/jobs', 'Admin\JobsController');
    Route::post('admin/jobs/order', 'Admin\JobsController@order');

    Route::resource('admin/topics', 'Admin\TopicsController');
    Route::post('admin/topics/order', 'Admin\TopicsController@order');

    Route::resource('admin/talk', 'Admin\TalkController');

    Route::resource('admin/schedule-items', 'Admin\ScheduleItemController');

    Route::resource('admin/blog-items', 'Admin\BlogItemsController');
    Route::post('admin/blog-items/order', 'Admin\BlogItemsController@order');

    Route::get('/admin/sponsorshipPackage', 'Admin\SponsorshipPackageController@index');
    Route::post('/admin/sponsorshipPackage', 'Admin\SponsorshipPackageController@store');

    Route::resource('/admin/event-images', 'Admin\EventImagesController');
    Route::post('admin/event-images/order', 'Admin\EventImagesController@order');

    Route::delete('admin/event-images-files/{eventImagesFile}', 'Admin\EventImagesFilesController@destroy');

    Route::resource('/admin/video-groups', 'Admin\VideoGroupsController');
    Route::post('admin/video-groups/order', 'Admin\VideoGroupsController@order');

    Route::resource('/admin/videos', 'Admin\VideosController');
    Route::post('admin/videos/order', 'Admin\VideosController@order');
});

Route::group(['prefix' => 'admin'], function () {
    // Authentication Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::match(
        ['get', 'post'],
        'register',
        function () {
            return redirect(url('admin/login'));
        }
    );
});
