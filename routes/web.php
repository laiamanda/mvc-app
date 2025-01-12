<?php 
    $routes = [
        'GET' => [
            '/' => 'HomeController@index',
            '/about' => 'HomeController@about',
            '/contact' => 'HomeController@contact',
            '/user/register' => 'UserController@showRegisterForm',
            '/user/login' => 'UserController@showLoginForm',
            '/dashboard' => 'AdminController@dashboard',
            '/admin' => 'AdminController@admin',
            '/admin/user/profile' => 'UserController@showProfile',
        ],
        'POST' => [
            '/register' => 'UserController@register',
            '/login' => 'UserController@login',
            '/logout' => 'UserController@logout',
            '/admin/user/update' => 'UserController@updateProfile',
            '/admin/profile/user/password/update' => 'UserController@updateUserProfilePassword',
        ],
    ];
?>