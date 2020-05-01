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


Route::get('/', 'HomepageController@index');
Route::get('/category/{id}', 'ListingController@listing1');
Route::get('/listing', 'ListingController@index');
Route::get('/details/{slug}', 'DetailController@index')->name('details');
Route::post('/comments', 'DetailController@comment');

Route::group(['prefix' => 'back', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/category', 'Admin\CategoryController@index');
    Route::get('/category/create', 'Admin\CategoryController@create');
    Route::get('/category/edit', 'Admin\CategoryController@edit');
    
    // Start Permission Module
    
    Route::get('/permissions', [
        'uses' => 'Admin\PermissionController@index',
        'as' => 'permissions',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);
    Route::get('/permission/create', [
        'uses' => 'Admin\PermissionController@create',
        'as' => 'permission.create',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);
    Route::post('/permission/store', [
        'uses' => 'Admin\PermissionController@store',
        'as' => 'permission.store',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);
    Route::get('/permission/edit/{id}', [
        'uses' => 'Admin\PermissionController@edit',
        'as' => 'permission.edit',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);
    Route::put('/permission/update/{id}', [
        'uses' => 'Admin\PermissionController@update',
        'as' => 'permission.update',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);
    Route::get('/permission/delete/{id}', [
        'uses' => 'Admin\PermissionController@destroy',
        'as' => 'permission.delete',
        'middleware'=> 'permission:Permission List|All|Permission'
    ]);

    // End Permission Module

    // Start Role Module

        Route::get('/roles', [
            'uses' => 'Admin\RoleController@index',
            'as' => 'roles'
        ]);
        Route::get('/role/create', [
            'uses' => 'Admin\RoleController@create',
            'as' => 'role.create'
        ]);
        Route::post('/role/store', [
            'uses' => 'Admin\RoleController@store',
            'as' => 'role.store'
        ]);
        Route::get('/role/edit/{id}', [
            'uses' => 'Admin\RoleController@edit',
            'as' => 'role.edit'
        ]);
        Route::put('/role/update/{id}', [
            'uses' => 'Admin\RoleController@update',
            'as' => 'role.update'
        ]);
        Route::get('/role/delete/{id}', [
            'uses' => 'Admin\RoleController@destroy',
            'as' => 'role.delete'
        ]);

    // End Role Module

    // Start Author Module

        Route::get('/authors', [
            'uses' => 'Admin\AuthorController@index',
            'as' => 'authors'
        ]);
        Route::get('/author/create', [
            'uses' => 'Admin\AuthorController@create',
            'as' => 'author.create'
        ]);
        Route::post('/author/store', [
            'uses' => 'Admin\AuthorController@store',
            'as' => 'author.create'
        ]);
        Route::get('/author/edit/{id}', [
            'uses' => 'Admin\AuthorController@edit',
            'as' => 'author.edit'
        ]);
        Route::put('/author/update/{id}', [
            'uses' => 'Admin\AuthorController@update',
            'as' => 'author.update'
        ]);
        Route::delete('/author/delete/{id}', [
            'uses' => 'Admin\AuthorController@destroy',
            'as' => 'author.delete'
        ]);

    // End Role Module

    // Start Category Module

        Route::get('/categories', [
            'uses'=>'Admin\CategoryController@index',
            'as'=>'categories', 
            'middleware'=> 'permission:Category List|All'
        ] );

        Route::get('/category/create', [
            'uses'=>'Admin\CategoryController@create',
            'as'=>'category.create', 
            'middleware'=> 'permission:Category Add|All'
        ] );
        
        Route::post('/category/store', [
            'uses'=>'Admin\CategoryController@store',
            'as'=>'category.store', 
            'middleware'=> 'permission:Category Add|All'            
        ] );
        
        Route::put('/category/status/{id}', [
            'uses'=>'Admin\CategoryController@status',
            'as'=>'category.status', 
            'middleware'=> 'permission:Category List|All'
        ] );
        
        Route::get('/category/edit/{id}', [
            'uses'=>'Admin\CategoryController@edit',
            'as'=>'category.edit', 
            'middleware'=> 'permission:Category List|All'
        ] );
        
        Route::put('/category/update/{id}', [
            'uses'=>'Admin\CategoryController@update',
            'as'=>'category.update', 
            'middleware'=> 'permission:Category Update|All'
        ] );
        
        Route::delete('/category/delete/{id}', [
            'uses'=>'Admin\CategoryController@destroy',
            'as'=>'category.delete', 
            'middleware'=> 'permission:Category Delete|All'
        ] );     

    // End Category Module

    // Start Post Module

        Route::get('/posts', [
            'uses'=>'Admin\PostController@index',
            'as'=>'posts', 
            'middleware'=> 'permission:Category List|All'
        ] );

        Route::get('/post/create', [
            'uses'=>'Admin\PostController@create',
            'as'=>'post.create', 
            'middleware'=> 'permission:Post Add|All'
        ] );
        
        Route::post('/post/store', [
            'uses'=>'Admin\PostController@store',
            'as'=>'post.store', 
            'middleware'=> 'permission:Post Add|All'            
        ] );
        
        Route::put('/post/status/{id}', [
            'uses'=>'Admin\PostController@status',
            'as'=>'post.status', 
            'middleware'=> 'permission:Post List|All'
        ] );

        Route::put('/post/hot_news/{id}', [
            'uses'=>'Admin\PostController@hot_news',
            'as'=>'post.hot_news', 
            'middleware'=> 'permission:Post List|All'
        ] );
        
        Route::get('/post/edit/{id}', [
            'uses'=>'Admin\PostController@edit',
            'as'=>'post.edit', 
            'middleware'=> 'permission:Post List|All'
        ] );
        
        Route::put('/post/update/{id}', [
            'uses'=>'Admin\PostController@update',
            'as'=>'post.update', 
            'middleware'=> 'permission:Post Update|All'
        ] );
        
        Route::delete('/post/delete/{id}', [
            'uses'=>'Admin\PostController@destroy',
            'as'=>'post.delete', 
            'middleware'=> 'permission:Post Delete|All'
        ] );     

    // End Post Module

    // Start Comment Module

    Route::get('/comment/{id}', [
            'uses'=>'Admin\CommentController@index',
            'as'=>'comments', 
            'middleware'=> 'permission:Post List|All'
        ] );

    Route::get('/comment/reply/{id}', [
            'uses'=>'Admin\CommentController@reply',
            'as'=>'comment.view', 
            'middleware'=> 'permission:Post List|All'
        ] );
    
    Route::post('/comment/reply', [
            'uses'=>'Admin\CommentController@store',
            'as'=>'comment.reply', 
            'middleware'=> 'permission:Post List|All'
        ] );
    
    Route::put('/comment/status/{id}', [
            'uses'=>'Admin\CommentController@status',
            'as'=>'comment.status', 
            'middleware'=> 'permission:Post List|All'
        ] );    

    // End Comment Module

    // Start Setting Module

    Route::get('/settings', [
            'uses'=>'Admin\SettingController@index',
            'as'=>'settings', 
            'middleware'=> 'permission:System Settings|All'
        ] );

    Route::put('/settings/update', [
            'uses'=>'Admin\SettingController@update',
            'as'=>'setting.update', 
            'middleware'=> 'permission:System Settings|All'
        ] );  

    // End Setting Module

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
