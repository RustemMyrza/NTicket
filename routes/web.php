<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Models\ConsultationRequest;
use App\Models\QuestionChat;
use App\Models\Segment;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Auth::routes([
    'register' => false,
    'reset'    =>  false,
]);
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@registerUser')->name('register.post');
Route::post('/search_suitable_route', 'App\Http\Controllers\RouteSearchController@getDataFromForm')->name('search.route')->middleware('auth');
Route::get('/search_suitable_route', 'App\Http\Controllers\RouteSearchController@getDataFromForm')->name('search.route.page')->middleware('auth');
Route::post('/cart/add/{routeId}', 'App\Http\Controllers\CartController@addToCart')->name('cart.add')->middleware('auth');
Route::delete('/cart/delete/{routeId}', 'App\Http\Controllers\CartController@deleteFromCart')->name('cart.delete')->middleware('auth');
Route::get('/cart', 'App\Http\Controllers\CartController@cartPage')->name('cart.page')->middleware('auth');
Route::post('/buy_ticket', 'App\Http\Controllers\TicketController@buyTicketPage')->name('buyTicket.page')->middleware('auth');
Route::get('/buy_ticket', 'App\Http\Controllers\TicketController@buyTicketPage')->name('buyTicket.page.get')->middleware('auth');
Route::post('/transaction', 'App\Http\Controllers\TicketController@transaction')->name('transaction')->middleware('auth');
Route::post('/profile/update', 'App\Http\Controllers\ProfileController@updateProfile')->name('update.profile')->middleware('auth');

Route::get('/my_tickets', 'App\Http\Controllers\TicketController@myTicketPage')->name('tickets.my_tickets')->middleware('auth');
Route::get('/profile/id_card', 'App\Http\Controllers\ProfileController@idCardPage')->name('profile.idCard')->middleware('auth');
Route::post('/profile/id_card/update', 'App\Http\Controllers\ProfileController@idCardDataUpdate')->name('profile.idCard.update')->middleware('auth');
Route::get('/profile/bankCard', 'App\Http\Controllers\ProfileController@bankCardPage')->name('profile.bankCard')->middleware('auth');
Route::post('/profile/bankCard/update', 'App\Http\Controllers\ProfileController@bankCardDataUpdate')->name('profile.bankCard.update')->middleware('auth');
Route::post('/consultationRequest/create', 'App\Http\Controllers\RequestController@toBitrix')->name('request.create');

Route::get('/mail', 'App\Http\Controllers\MailController@send');
Route::post('/question/create', function (Request $request) {
    $userId = Auth::user()->id;
    $requestData = $request->all();
    $question= new QuestionChat();
    $question->question = $requestData['question'];
    $question->asked = $userId;
    $question->save();
    return redirect()->back()->with('success_message', 'Вопрос отправлен, пожалуйста подождите и вам ответят в ближайшее время');
})->name('question.create');

Route::get('/mainPage', function () {
    return view('pages.mainPage');
})->name('tickets.home');
Route::get('/search_results', function () {
    $segmentsDateTime = Segment::pluck('departure_time')->toArray();
    $segmentsDate = [];
    foreach($segmentsDateTime as $item)
    {
        $segmentsDate[] = explode(' ', $item)[0];
    }
    return view('pages.searchResults', compact(['segmentsDate']));
})->name('tickets.search_results')->middleware('auth');
Route::get('/chat_help', function () {
    $userId = Auth::user()->id;
    $chatHelp = QuestionChat::where('asked', $userId)->get();
    return view('pages.chatHelp', compact(['chatHelp']));
})->name('tickets.chat_help')->middleware('auth');
Route::get('/profile', function () {
    $userData = Auth::user();
    return view('pages.profile', compact('userData'));
})->name('tickets.profile')->middleware('auth');
// Route::get('/cart', function () {
//     return view('pages.cart');
// })->name('users.cart')->middleware('auth');

// Route::post('/register', function (Request $request) {
//     return app()->make(\App\Http\Controllers\Auth\RegisterController::class)->registerUser($request);
// })->name('registerUser');