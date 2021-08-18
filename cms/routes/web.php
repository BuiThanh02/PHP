<?php

use Illuminate\Support\Facades\Route;
use app\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile/{name}', 'ProfileController@showProfile');

Route::get('about', function (){
    return 'About Content';
});

Route::get('about/direction', function (){
    return 'About Direction Content';
});

Route::any('submit-form', function(){
   return 'Process Form';
});

Route::get('about/{theSubject}', function ($theSubject){
    return $theSubject. ' content goes here';
});

Route::get('{Art},{Price}', function ($Art, $Price){
    return 'This '.$Art.' price is: '.$Price;
});

Route::get('where', function (){
    return Redirect::to('about/direction');
});

Route::get('about/{theSubject}', 'AboutController@showSubject');

Route::get('home', 'HomeController@showWelcome');

Route::get('/insert', function (){
    DB::insert('insert into posts(title, body, is_admin) value (?,?,?)', ['PHP with Laravel','laravel is the best framework !', '0']);
    return 'DONE';
});

Route::get('/read', function (){
    $result = DB::select( 'select * from posts where id = ?', [1]);
    //return $result;
    foreach ($result as $post){
        return $post->body;
    }
});

Route::get('update', function (){
    $updated = DB::update('update posts set title = "New Title hihi" where id > ?', [1]);
    return $updated;
});

Route::get('delete', function (){
    $deleted = DB::delete('delete from posts where id = ?', [3]);
    return $deleted;
});

Route::get('readAll', function (){
    $posts = Post::all();
    foreach ($posts as $p){
        echo $p -> title . " " . $p->body;
        echo "<br>";
    }
});

Route::get('findId', function (){
    $posts = Post::where('id', '>=', 2)
        ->where('title', 'PHP with Laravel')
        ->where('body', 'like', '%Laravel%')
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
    foreach ($posts as $p){
        echo $p -> title . " " . $p->body;
        echo "<br>";
    }
});

Route::get('insertORM', function (){
    $p = new Post;
    $p->title = 'insert ORM';
    $p->body = 'INSERT done done ORM';
    $p->is_admin = 1;
    $p->save();
});

Route::get('updateORM', function (){
    $p = new Post;
    $p->title = 'update ORM';
    $p->body = 'updated Ahihi DONE DONE';
    $p->save();
});

Route::get('deleteORM', function (){
    Post::where('id', '>=', 14)
        ->delete();
});

Route::get('destroyORM', function (){
    Post::destroy(7, 11);
});
