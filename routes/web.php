<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cache', function (){
    Artisan::call('config:cache');
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/blog', [SiteController::class, 'blog']);
Route::get('/news/{id}', [SiteController::class, 'news']);
Route::get('/foods', [SiteController::class, 'foods']);
Route::get('/food/{id}', [SiteController::class, 'food']);
Route::get('/listings', [SiteController::class, 'listings']);
Route::get('/search', [SiteController::class, 'search']);
Route::get('/search/{id}', [SiteController::class, 'searchCat']);
Route::get('/searchListing', [SiteController::class, 'searchListing']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/faq', [SiteController::class, 'faq']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::get('/listing/{id}', [SiteController::class, 'listing']);
Route::get('/change_lang/{lang}', [LocalizationController::class, 'lang_change']);
Route::post('/addreview', [SetController::class, 'addreview']);
Route::post('/adddisput', [SetController::class, 'disput']);
Route::post('/checkout', [Listings::class, 'checkout']);
Route::get('/booking', [SiteController::class, 'booking']);


Route::get('my-captcha', [\App\Http\Controllers\HomeController::class, 'myCaptcha'])->name('myCaptcha');
Route::post('my-captcha', [\App\Http\Controllers\HomeController::class, 'myCaptchaPost'])->name('myCaptcha.post');
Route::get('refresh_captcha', [\App\Http\Controllers\HomeController::class, 'refreshCaptcha'])->name('refresh_captcha');





Route::post('/check-login/{login}', function (Request $request,$login) {
    $user = DB::table('users')->where('login',$login)->first();
    if(isset($user->login)){
        return ['status' => "false"];
    }else{
        return ['status' => 'True'];
    }
});


Route::get('tt', function (Request $request) {
    dd($request);
});

Route::get('mt', function (Request $request) {
    Mail::to('vodimaxjon@gmail.com')->send(new \App\Mail\OrderShipped('Salomlar'));
});


Route::get('/terms', function (Request $request) {
    return view('terms');
});
Route::get('/oferta', function (Request $request) {
    return view('terms');
});

Route::get('/privacy', function (Request $request) {
    return view('privacy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashController::class, 'dashboard']);
    Route::get('/add-listing', [DashController::class, 'addlisting']);
    Route::get('/del-listing/{id}', [DashController::class, 'listdelete']);
    Route::post('/listad', [DashController::class, 'listad']);
    Route::get('/bookings', [DashController::class, 'bookings']);
    Route::get('/myorders', [DashController::class, 'myorders']);
    Route::get('/invioce/{id}', [DashController::class, 'invioce']);
    Route::get('/messages', [DashController::class, 'messages']);
    Route::get('/wallet', [DashController::class, 'wallet']);
    Route::get('/comments', [DashController::class, 'comments']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile2', [ProfileController::class, 'refresh'])->name('profile.refresh');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});








Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);




require __DIR__ . '/auth.php';
