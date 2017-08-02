<?php

Route::get('lessons/{id}/tags', 'TagsController@index');
Route::resource('lessons', 'LessonsController');
Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);