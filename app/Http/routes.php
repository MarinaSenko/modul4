<?php
    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | This route group applies the "web" middleware group to every route
    | it contains. The "web" middleware group is defined in your HTTP
    | kernel and includes session state, CSRF protection, and more.
    |
    */
    Route::group(['middleware' => 'web'], function () {
        Route::auth();
        Route::get('/', 'PortalController@index');
        Route::get('news', 'PortalController@showallnews');
        Route::get('news/{id}', 'PortalController@shownewsrecord');
        Route::get('category/{id}', 'PortalController@newscategory');
        

        Route::get('admin', 'Admin\AdminController@index');
        Route::resource('admin/users', 'Admin\UserController');
        Route::resource('admin/newscategories', 'Admin\NewsCategoryController');
        Route::resource('admin/promotion', 'Admin\PromotionController');
        Route::resource('admin/news', 'Admin\NewsController');
        Route::get('admin/comments', 'Admin\CommentsController@index');
        Route::get('admin/comments/notapproved', 'Admin\CommentsController@notapproved');
        Route::get('admin/comments/{id}/delete', 'Admin\CommentsController@destroy');
        Route::get('admin/comments/{id}/approve', 'Admin\CommentsController@approve');

        Route::post('news/{id}/addcomment', 'CommentsController@store');
        Route::get('news/{news_id}/comment/{id}/delete', 'CommentsController@destroy');
       
        Route::post('/query', [
                'uses' => 'SearchController@query',
                'as' => 'search'
            ]);
    });