<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RateLimiterMiddleware;
use App\Models\Post;
use App\Models\User;
use App\Models\UserNi;
use App\Notifications\AccountCreatedNotification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendMail', [MailController::class, 'index']);
Route::get('/triggerNotification', function(){
    $user = User::first();
    $user->notify(new AccountCreatedNotification());
});
// Route::get('/posts', [SignupController::class, 'posts'])->name('posts');
Route::get('/posts', function(){
    $comments = Post::with(['comments'])->find('1');
    $x = true and false;
    dd($x);
    echo $comments->title . '<br>';
    echo $comments->likes . '<br>';
    foreach($comments->comments as $comment){
        echo $comment->comments . '<br>';
    }
    
    // dd($comments);
})->name('posts');


Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/register', [SignupController::class, 'register'])->name('register');
Route::get('/login', [SignupController::class, 'login'])->name('login');
Route::post('/login', [SignupController::class, 'Authenticate'])->name('Authenticate');

Route::get('one-to-one', function(){
    // $users = User::with(['identity'])->find(1);
    // // dd($users, $users->identity);
    // echo 'user name ' . $users->name . '<br>';
    // echo 'user email ' . $users->email . '<br>';
    // echo 'user name ' . $users->identity ?-> identity_no . '<br>';

    $identity = UserNi::where(['user_id' => 1])->with(['user'])->first();
    dd($identity);

});

Route::get('/students', [StudentController::class, 'index']);
Route::resource('/students', StudentController::class);

Route::resource('/books', BookController::class);

Route::get('/user_r', [UserController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'show']);

Route::resource('test', TestController::class);

