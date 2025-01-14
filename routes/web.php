<?php 

    Router:: get('/', 'HomeController@index');
    Router:: get('/about', 'HomeController@about');
    Router:: get('/contact', 'HomeController@contact');
    Router:: get('/user/register', 'UserController@showRegisterForm');
    Router:: get('/user/login', 'UserController@showLoginForm');
    Router:: get('/dashboard', 'AdminController@dashboard');
    Router:: get('/admin', 'AdminController@admin');
    Router:: get('/admin/user/profile', 'UserController@showProfile');
    Router:: get('/user/test/{id}', 'UserController@test');
    Router:: get('/admin/test/{id}', 'AdminController@test')->name('admin.test');

    Router:: post('/register', 'UserController@register');
    Router:: post('/login', 'UserController@login')->name('login');
    Router:: post('/logout', 'UserController@logout');
    Router:: post('/admin/user/update', 'UserController@updateProfile')->name('update.profile');
    Router:: post('/admin/profile/user/password/update', 'UserController@updateUserProfilePassword');

    // Router:: get('/admin/test/{id}', 'AdminController@test')->name('admin.test');
?>