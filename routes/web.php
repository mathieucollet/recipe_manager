<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(
    ['middleware' => 'auth'],
    function () {
        // Ingredients
        Route::resource('ingredient', 'IngredientController');

        // Recipes
        Route::get('/recipe/marks', 'RecipeController@marks')->name('recipe.marks');
        Route::get('/recipe/{recipe}/mark', 'RecipeController@marking')->name('recipe.marking');
        Route::resource('recipe', 'RecipeController');

        // Picture
        Route::delete('/picture/{picture}', 'PictureController@destroy')->name('picture.destroy');

        Route::group(
            ['middleware' => 'admin'],
            function () {
                // Tags
                Route::resource('/admin/tag', 'Admin\TagController');
            }
        );
    }
);