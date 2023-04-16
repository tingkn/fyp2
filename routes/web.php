<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PostController,UserController, ReplyController,
                            CommentController,VoteController, SettingController, ContactFormController, 
                            FormsController, UserBlogController, ForumController, HTRecycleController,
                            WTRecycleController, MessagesController, WelcomeController, FavoritesController,
                            QuizzesController, NewsletterController};


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::view('/', 'welcome')->name('welcome');
Route::get('/', [WelcomeController::class,'show'])->name('welcome.show');

Route::resource('post', PostController::class);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('comment', CommentController::class)
        ->except('create', 'show');

    Route::resource('reply', ReplyController::class)
        ->except('create', 'show');

    Route::resource('vote', VoteController::class)
        ->only('store');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/change-profile', [SettingController::class, 'ChangeProfile'])->name('setting.ChangeProfile');
    Route::put('/change-password', [SettingController::class, 'ChangePassword'])->name('setting.ChangePassword');
    Route::post('/delete-profile', [SettingController::class, 'deleteProfile'])->name('delete-profile');
});

Route::get('/blog', ['as'=>'blog',function() {
    return view('blog');
}]);

Route::get('/contactus', ['as'=>'contact',function() {
    return view('contactus');
}]);

Route::get('/forum', ['as'=>'forum',function() {
    return view('forum');
}]);

Route::get('/HTRecycle', ['as'=>'howto',function() {
    return view('HTRecycle');
}]);

Route::resource('quizzes', QuizzesController::class)->only(['index', 'show']);
Route::post('quizzes/{quiz}/answer', [QuizzesController::class, 'answer'])->name('quizzes.answer');

Route::get('/WTRecycle', ['as'=>'whereto',function() {
    return view('WTRecycle');
}]);

// Newsletter 
Route::post('/newsletter', [NewsletterController::class, 'store']);

// Contact Form Controller
Route::resource('contactus', ContactFormController::class);
Route::resource('/contactus', ContactFormController::class);


// Blog Controller
Route::resource('blog', UserBlogController::class);
Route::resource('/blog', UserBlogController::class);
Route::get('/blog/{title}', [UserBlogController::class,'show'])->name('blog.show');

// Chat
Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessagesController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

//Where to Recycle
Route::get('/WTRecycle', [WTRecycleController::class, 'index'])->name('WTRecycle.index');


// Favourites
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index');
Route::post('/favorites', [FavoritesController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{id}', [FavoritesController::class, 'destroy'])->name('favorites.destroy');