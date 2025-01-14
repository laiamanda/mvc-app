<?php 
    $router = new Route();

    $router -> get('/', 'HomeController@index');
    $router -> get('/about', 'HomeController@about');
    $router -> get('/contact', 'HomeController@contact');
    $router -> get('/user/register', 'UserController@showRegisterForm');
    $router -> get('/user/login', 'UserController@showLoginForm');
    $router -> get('/dashboard', 'AdminController@dashboard');
    $router -> get('/admin', 'AdminController@admin');
    $router -> get('/admin/user/profile', 'UserController@showProfile');

    $router -> post('/register', 'UserController@register');
    $router -> post('/login', 'UserController@login');
    $router -> post('/logout', 'UserController@logout');
    $router -> post('/admin/user/update', 'UserController@updateProfile');
    $router -> post('/admin/profile/user/password/update', 'UserController@updateUserProfilePassword');
?>