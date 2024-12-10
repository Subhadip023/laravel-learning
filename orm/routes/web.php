<?php
namespace App\Models;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/read',function(){
$posts=Post::all();
return $posts;

// foreach ($posts as $post) { 
//     return $post->title;
// }
});


Route::get('/find/{id}',function($id){  

$posts= Post::find($id);

return $posts->title;

});
Route::get('/findWhere',function(){  

$posts= Post::where('id',2)->orderBy('id',direction: 'desc')->take(1)->get();

return $posts;

});

Route::get('/findmore',function(){


    // $post = Post::findOrFail(4);
    $post = Post::where('user_count','<',50)->firstOrFail(4);
    return $post;
});

// insert data in db
Route::get('/basic-insert',function(){
    $post =new Post;

    $post->title = 'New post title using Eloquent';
    $post->body='This is the body using eloquent';
    $post->save(); //this save method will insert the data

    return "insert done !";

    // to update data you have to find the data and the by using save you can update
});
Route::get('/basic-update',function(){
    $post = Post::find(2);

    $post->title = 'title 2 update ';
    $post->body='This is the body using eloquent and updated';
    $post->save(); //this save method will insert the data

    return "save done done !";

    // to update data you have to find the data and the by using save you can update
});

Route :: get('/create',function(){
    Post::create(['title'=> 'the create method ','body'=> 'this is made by create method im Eloquent']);
    
    return "create done ";
});

Route::get("/update",function(){
    Post::where('id',3)->update(['title'=>'this is updated title 3','body'=>'this is updtaed body using Eloquent']);
    return 'done !';
});
Route::get('/delete',function(){
    $post =Post::where('id',4);
    $post->delete();
    return 'done !';
});


Route::get('/soft-delete',function(){


    // Post::find(8);
    $post = Post::find(2);
    $post->delete();
    return 'done !';
});

Route::get('/retrive',function(){

    // $post = Post::withTrashed()->where('id',1)->get();
    $post = Post::onlyTrashed()->where('id',1)->get();
    return $post;
});

Route::get('/restore',function(){

    // $post = Post::withTrashed()->where('id',1)->get();
    $post = Post::onlyTrashed()->where('id',1)->restore();
    return $post;
});


Route::get('/forceDelete',function(){
$post = Post::onlyTrashed()->where('id',2)->forceDelete();
return $post;
});

Route::get('/user/{id}/post',function($id){
    return User::find($id)->post;

});


Route::get('/post/{id}/user',function($id){
    return Post::find($id)->user->name;

});

Route::get('/posts',function(){

$user =User::find(1);

foreach ($user->posts as $post){
    echo $post->title .'<br>';
}

});


Route::get('/user/{id}/role',function($id){
    $user=User::find($id)->roles()->orderBy('id','desc')->get();

    return $user;
});


Route::get('/user/privent',function(){
    $user=User::find(1);
    
    foreach( $user->roles as $role){
        echo $role->pivot->created_at .'<br>';
    }
});

Route::get('/user/country',function(){

    $country=Country::find(1);
    foreach( $country->posts as $post){
        return $post->title .'<br>';
    }
});



