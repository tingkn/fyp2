<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PostController,UserController,
                            ReplyController,CommentController,VoteController,
                            SettingController, ContactFormController, FormsController};
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HTRecycleController;
// use App\Http\Controllers\PlasticsController;
// use App\Http\Controllers\RecyclingCentreController;


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

Route::get('/quiz', function () {
    return view('quiz');
});

Route::post('/quiz', function () {
    $answer = request('answer');

    // Check the answer and set the session variable accordingly
    if ($answer === 'Paris' || $answer === 'China') {
        session(['answer' => 'correct']);
    } else {
        session(['answer' => 'incorrect']);
    }

    return back();
});

Route::get('/result', ['as'=>'result',function() {
    return view('result');
}]);

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

