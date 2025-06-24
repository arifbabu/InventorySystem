<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MostViewController;
use App\Http\Controllers\postViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    return redirect()->route('post.view.homepage');
});

// Route::get('/website/home', function () {return view('welcome');});
Route::get('/website/pages/home', function () {return view('website.partials.pages.home');});
Route::get('/website/pages/about', function () {return view('website.partials.pages.about');});
Route::get('/website/pages/contact', function () {return view('website.partials.pages.contact');});
Route::get('/website/pages/post_details', function () {return view('website.partials.pages.post_details');});



// Auth::routes();

Auth::routes(['verify' => true]);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  
Route::group(['prefix' => 'admin/','middleware' => ['auth']], function(){   
    
    
    // SiteMap Create -------------

Route::get('/site/map', [postController::class, 'sitemap'])->name('site.map'); // SiteMap Route

// ------------------ post Route Starts Here

Route::get('/user/dashBoard', [DashboardController::class, 'index'])->name('user.dashboard');


//---------  Trash Route Starts Here
Route::get('/post/postTrash', [postController::class, 'postTrash'])->name('post.postTrash');
Route::get('/post/restorepost', [postController::class, 'restorepost'])->name('post.restorepost')->middleware(['can:post.restore']);
Route::get('/post/permanentDeletepost', [postController::class, 'permanentDeletepost'])->name('post.permanentDeletepost')->middleware(['can:post.pDelete']);
Route::get('/post/userTrash', [postController::class, 'userTrash'])->name('post.userTrash');
// Trash Route Ends Here

// ---------------- Approval Routes Starts


// Route::get('/post/email/inbox', [postController::class, 'emailinbox'])->name('post.email.index');
Route::get('/post/email/emailcompose', [postController::class, 'emailcompose'])->name('post.email.emailcompose');



//-------   post Basic Route Starts
Route::get('/post/active', [postController::class, 'active'])->name('post.active')->middleware(['can:post.active']);
Route::get('/post/inActive', [postController::class, 'inActive'])->name('post.inActive')->middleware(['can:post.inActive']);
Route::get('/post/userpost', [postController::class, 'userpost'])->name('post.userpost');
Route::get('/post/create', [postController::class, 'create'])->name('post.create')->middleware(['can:post.create']);
Route::get('/post/show/{id}', [postController::class, 'show'])->name('post.show')->middleware(['can:post.show']);
Route::get('/post/edit/{slug}', [postController::class, 'edit'])->name('post.edit')->middleware(['can:post.edit']);
Route::post('/post/update/{slug}', [postController::class, 'update'])->name('post.update');
Route::post('/post/store', [postController::class, 'store'])->name('post.store');
Route::post('/post/destroy', [postController::class, 'destroy'])->name('post.destroy')->middleware(['can:post.delete']);
// post Basic Route Ends

// post AJAX Route Starts
Route::get('/changeStatus', [postController::class, 'changeStatus'])->name('post.changeStatus');
Route::get('/post/adminsinglepostShow', [postController::class, 'adminsinglepostShow'])->name('post.admin.show');
// post AJAX Route Ends


//---------- Category Route Starts Here
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index')->middleware(['can:category.show']);
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['can:category.create']);
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['can:category.edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['can:category.delete']);


//  Roles Route Starts Here
Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index')->middleware(['can:role.show']);
Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware(['can:role.create']);
Route::get('roles/show/{name}', [RoleController::class, 'show'])->name('roles.show')->middleware(['can:role.show']);
Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('roles/edit/{name}', [RoleController::class, 'edit'])->name('roles.edit')->middleware(['can:role.edit']);
Route::post('roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['can:role.delete']);


//  User Route Starts Here
Route::get('users/index', [UserController::class, 'index'])->name('users.index')->middleware(['can:user.index']);
Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware(['can:user.create']);
Route::get('users/show/{name}', [UserController::class, 'show'])->name('users.show')->middleware(['can:user.show']);
Route::post('users/store', [UserController::class, 'store'])->name('users.store');
Route::get('users/edit/{name}', [UserController::class, 'edit'])->name('users.edit')->middleware(['can:user.edit']);
Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('users/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['can:user.delete']);
Route::get('/user/restoreUser', [UserController::class, 'restoreUser'])->name('user.restoreUser')->middleware(['can:user.restore']);
Route::get('/user/permanentDeleteUser', [UserController::class, 'permanentDeleteUser'])->name('user.permanentDeleteUser')->middleware(['can:user.pDelete']);



// ------------  Views Route Starts Here

//------------  Most View Starts Here
Route::get('views/userwise', [MostViewController::class, 'userwise'])->name('userwise.index')->middleware(['can:mostView.show']);
Route::get('views/postwise', [MostViewController::class, 'postwise'])->name('postwise.index')->middleware(['can:mostView.show']);
Route::get('views/categorywise', [MostViewController::class, 'categorywise'])->name('categorywise.index')->middleware(['can:mostView.show']);
Route::get('views/monthwise', [MostViewController::class, 'monthwise'])->name('monthwise.index')->middleware(['can:mostView.show']);
// Most View Ends Here




Route::get('views/index', [MostViewController::class, 'index'])->name('views.index');
Route::get('views/create', [MostViewController::class, 'create'])->name('views.create');
Route::get('views/show/{id}', [MostViewController::class, 'show'])->name('views.show');
Route::post('views/store', [MostViewController::class, 'store'])->name('views.store');
Route::get('views/edit/{id}', [MostViewController::class, 'edit'])->name('views.edit');
Route::post('views/update/{id}', [MostViewController::class, 'update'])->name('views.update');
Route::delete('views/destroy/{id}', [MostViewController::class, 'destroy'])->name('views.destroy');



// ************** ------------  Chart Route Starts Here

// Route::get('views/page', [MostViewController::class, 'page'])->name('views.index');
// Route::put('views/update/{id}', [MostViewController::class, 'update'])->name('views.update');
Route::get('chart/userchart', [ChartController::class, 'userchart'])->name('userchart.index');


//********** ---------  Mail Route Starts Here

Route::get('contact/page/view', [MailController::class, 'contactPage'])->name('contactPage.contact');
Route::post('user/mail/store', [MailController::class, 'userMailStore'])->name('user.mail.store');
Route::get('admin/email/index', [MailController::class, 'index'])->name('admin.email.index')->middleware(['can:email.show']);
Route::post('mail/single/destroy/{id}', [MailController::class, 'singleEmailDelete'])->name('mail.single.destroy')->middleware(['can:email.delete']);
Route::post('/mail/destroy', [MailController::class, 'destroy'])->name('mail.destroy')->middleware(['can:email.delete']);
Route::get('/mail/emailTrash', [MailController::class, 'mailTrash'])->name('mail.mailTrash');
Route::get('/mail/restoreEmail', [MailController::class, 'restoreEmail'])->name('email.restoreEmail')->middleware(['can:email.restore']);
Route::get('/mail/permanentDeleteEmail', [MailController::class, 'permanentDeleteEmail'])->name('email.permanentDeleteEmail')->middleware(['can:email.pDelete']);
Route::get('/mail/show/{id}', [MailController::class, 'show'])->name('mail.show')->middleware(['can:email.show']);

Route::delete('delete-all', [MailController::class, 'removeMulti'])->middleware(['can:email.deleteAll']);
//---------  Mail Route Ends Here

});




// postView Route Starts Here
Route::get('post/view/category/{slug}', [postViewController::class, 'category'])->name('post.view.category');
Route::get('post/view/homepage', [postViewController::class, 'homepage'])->name('post.view.homepage');
Route::get('post/view/widget', [postViewController::class, 'widget'])->name('post.view.widget');
Route::get('post/view/show/{slug}', [postViewController::class, 'show'])->name('post.view.show');

// postView Route Ends Here



//----------  Redirect Home Page When URL NOT Found 

Route::any('{url}', function(){
    abort(404);
})->where('url', '.*');

// Route::any('{url}', function(){
//     return redirect()->route('post.view.homepage');
// })->where('url', '.*');
