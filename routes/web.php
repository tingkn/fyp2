<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PostController,UserController, ReplyController,
                            CommentController,VoteController, SettingController, ContactFormController, 
                            FormsController, UserBlogController, ForumController, HTRecycleController,
                            WTRecycleController, MessagesController, WelcomeController, FavoritesController,
                            QuizzesController};


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::view('/', 'welcome')->name('welcome');
Route::get('/', [App\Http\Controllers\WelcomeController::class,'show'])->name('welcome.show');

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


// Newsletter Receiver
Route::post('/newsletter', function (Request $request) {
    $email = $request->input('email');

    DB::table('newsletter')->insert([
        'email' => $email
    ]);

    return 'Email saved successfully!';
});

// Contact Form Controller
Route::resource('contactus', ContactFormController::class);
Route::resource('/contactus', ContactFormController::class);


// Blog Controller
Route::resource('blog', UserBlogController::class);
Route::resource('/blog', UserBlogController::class);
Route::get('/blog/{title}', [App\Http\Controllers\UserBlogController::class,'show'])->name('blog.show');

// Chat
Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessagesController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

//Where to Recycle
Route::get('/WTRecycle', [App\Http\Controllers\WTRecycleController::class, 'index'])->name('WTRecycle.index');


// Favourites
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index');
Route::post('/favorites', [FavoritesController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{id}', [App\Http\Controllers\FavoritesController::class, 'destroy'])
    ->name('favorites.destroy');