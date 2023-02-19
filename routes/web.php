<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PostController,UserController,ReplyController,CommentController,VoteController,SettingController};
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserBlogController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('post', PostController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('comment', CommentController::class)
        ->except('create', 'show');

    Route::resource('reply', ReplyController::class)
        ->except('create', 'show');

    Route::get('/notification', [UserController::class, 'notification'])
        ->name('notification');

    Route::get('/notification/{id}/{slug}', [UserController::class, 'markAsReadNotification'])
        ->name('notification.markAsRead');

    Route::resource('vote', VoteController::class)
        ->only('store');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/change-profile', [SettingController::class, 'ChangeProfile'])->name('setting.ChangeProfile');
    Route::put('/change-password', [SettingController::class, 'ChangePassword'])->name('setting.ChangePassword');
});

Route::get('/errors/404', ['as'=>'error',function() {
    return view('errors/404');
}]);

Route::get('/blog', ['as'=>'blog',function() {
    return view('blog');
}]);

Route::get('/chat', ['as'=>'chat',function() {
    return view('chat');
}]);

Route::get('/contactus', ['as'=>'contact',function() {
    return view('contactus');
}]);

Route::get('/forum', ['as'=>'forum',function() {
    return view('forum');
}]);

Route::get('/homepage', ['as'=>'homepage',function() {
    return view('homepage');
}]);

Route::get('/HTRecycle', ['as'=>'howto',function() {
    return view('HTRecycle');
}]);

Route::get('/newsletter', ['as'=>'newsletter',function() {
    return view('newsletter');
}]);

Route::get('/profile', ['as'=>'profile',function() {
    return view('profile');
}]);

Route::get('/quiz', ['as'=>'quiz',function() {
    return view('quiz');
}]);

Route::get('/result', ['as'=>'result',function() {
    return view('result');
}]);

Route::get('/WTRecycle', ['as'=>'whereto',function() {
    return view('WTRecycle');
}]);

// Admin
Route::get('/admin/adminUser', ['as'=>'adminuser',function() {
    return view('admin/adminUser');
}]);

Route::get('/admin/adminBlog', ['as'=>'adminblog',function() {
    return view('admin/adminBlog');
}]);

Route::get('/admin/adminForm', ['as'=>'adminform',function() {
    return view('admin/adminForm');
}]);

Route::get('/admin/adminForum', ['as'=>'adminform',function() {
    return view('admin/adminForum');
}]);

Route::get('/admin/adminLogin', ['as'=>'adminlogin',function() {
    return view('admin/adminLogin');
}]);

Route::get('/admin/adminNewsletter', ['as'=>'adminnews',function() {
    return view('admin/adminNewsletter');
}]);

Route::get('/admin/dashboard', ['as'=>'dashboard',function() {
    return view('admin/dashboard');
}]);

/* Controller */
// Admin Controller
Route::resource('companies', CompanyCRUDController::class);
Route::resource('/admin/companies', CompanyCRUDController::class);

Route::resource('blogs', BlogController::class);
Route::resource('/admin/blogs', BlogController::class);

// User Controller
Route::resource('blog', UserBlogController::class);
Route::resource('/blog', UserBlogController::class);