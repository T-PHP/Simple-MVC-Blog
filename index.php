<?php
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo "<h1>Please install via composer.json</h1>";
    echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
    exit;
}

if (!is_readable('app/Core/Config.php')) {
    die('No Config.php found, configure and rename Config.example.php to Config.php in app/Core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
    define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }

}

//initiate config
new Core\Config();

//create alias for Router
use Core\Router;
use Helpers\Hooks;

//Front Routes
Router::any('', 'Controllers\Blog@index');
Router::any('subpage', 'Controllers\Blog@subPage');
Router::any('p(:num)-(:any).html', 'Controllers\Blog@post');
//Admin Login Routes
Router::any('admin', 'Controllers\Admin\Admin@index');
Router::any('admin/login', 'Controllers\Admin\Auth@login');
Router::any('admin/logout', 'Controllers\Admin\Auth@logout');
// Admin Categories Routes
Router::any('admin/categories', 'Controllers\Admin\Categories@index');
Router::any('admin/categories/(:num)', 'Controllers\Admin\Categories@sub_categories');
Router::any('admin/categories/add', 'Controllers\Admin\Categories@add');
Router::any('admin/categories/edit/(:num)', 'Controllers\Admin\Categories@edit');
// Admin Posts Routes
Router::any('admin/posts', 'Controllers\Admin\Posts@index');
Router::any('admin/posts/(:num)', 'Controllers\Admin\Posts@sub_categories');
Router::any('admin/posts/add', 'Controllers\Admin\Posts@add');
Router::any('admin/posts/edit/(:num)', 'Controllers\Admin\Posts@edit');
// Admin Members Routes
Router::any('admin/members', 'Controllers\Admin\Members@index');
Router::any('admin/members/add', 'Controllers\Admin\Members@add');
Router::any('admin/members/edit/(:num)', 'Controllers\Admin\Members@edit');
// Admin SEO Routes
Router::any('admin/seo/robots', 'Controllers\Admin\Seo@robots');
//module routes
$hooks = Hooks::get();
$hooks->run('routes');

//if no route found
Router::error('Core\Error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
