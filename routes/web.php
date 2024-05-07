<?php

use App\Models\UserPoint;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameCaseController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\UserPointController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\PagesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Web\RecipeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Admin\NewPageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminRecipeController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\SpinWinController;




// =============== Home Routes ===============
Route::get('/', [WebController::class, 'spin'])->name('home');
Route::get('/spinning-wheel/', [WebController::class, 'spinWheel'])->name('home.spin');



Route::post('/save-winning-id', [SpinWinController::class, 'saveWinningId']);
Route::get('/case-category/{id}', [WebController::class, 'caseCategory'])->name('case.category');
Route::get('/fetch-win-chances/{cate_id}', [GameCaseController::class, 'fetchWinChances']);

Route::get('/blog/{slug}', [WebController::class, 'blogDetails'])->name('home.blog');
Route::get('/category/{slug}', [WebController::class, 'category'])->name('home.category');
Route::get('/about-me', [WebController::class, 'about'])->name('home.about');
Route::get('/privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/search', [WebController::class, 'searchRecipe'])->name('search.blog');
Route::get('sitemap.xml', [WebController::class, 'siteMap']);

Route::get('/page/{slug}', [HomeController::class, 'page'])->name('home.page');

Route::post('/contact/save', [HomeController::class, 'contactMessage'])->name('contact.save');

Route::post('comment/save', [CommentController::class, 'store'])->name('comment.save');
Route::get('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/dashboard', function () {
    return view('userPanel.admin.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/my-profile', [WebController::class, 'spinWin'])->name('home.win');

    Route::get('dashboard/blog/create', [UserPanelController::class, 'create'])->name('userBlog.create');
    Route::get('dashboard/blog', [UserPanelController::class, 'indexBlog'])->name('userBlog.list');
    Route::post('dashboard/blog/save', [UserPanelController::class, 'save'])->name('userBlog.save');
    Route::get('dashboard/blog/delete/{id}', [UserPanelController::class, 'delete'])->name('userBlog.delete');
    Route::get('dashboard/blog/edit/{id}', [UserPanelController::class, 'edit'])->name('userBlog.edit');
    Route::post('dashboard/blog/update', [UserPanelController::class, 'update'])->name('userBlog.update');
    Route::get('/profile/setting/update', [UserPanelController::class, 'profileSetting'])->name('profile.update.setting');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    //======== Category Routes ==========
    Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/category/save', [AdminCategoryController::class, 'save'])->name('category.save');
    Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('category.delete');
    Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::post('admin/category/update', [AdminCategoryController::class, 'update'])->name('category.update');

    Route::get('/admin/comment-list', function () {
        return view('backEnd.admin.comments');
    })->name('comment.message');


    //========== Blog Routes =================
    Route::get('admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('admin/blog', [BlogController::class, 'index'])->name('blog.list');
    Route::post('admin/blog/save', [BlogController::class, 'save'])->name('blog.save');
    Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('admin/blog/update', [BlogController::class, 'update'])->name('blog.update');



    // ============ Personal Update ==========
    Route::get('admin/personal-details', [AdminController::class, 'index'])->name('personal.details');

    //================ Website Setting =====================
    Route::get('admin/website/settings/', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

    // ================= Contact Message =================
    Route::get('/admin/contact/message', [AdminController::class, 'message'])->name('contact.message');
    Route::get('/admin/delete/message/{id}', [AdminController::class, 'messageDelete'])->name('contact.message.delete');

    Route::get('/admin/delete/comment/{id}', [CommentController::class, 'delete'])->name('comment.delete');

    //================ Page Routes =====================
    Route::get('admin/page/about/', [AdminController::class, 'homeAbout'])->name('page.homeAbout');
    Route::post('admin/page/about/', [AdminController::class, 'homeAboutSave'])->name('page.homeAboutSave');

    Route::get('admin/page/privacy/', [AdminController::class, 'homePrivacy'])->name('page.homePrivacy');
    Route::post('admin/page/privacy/save', [AdminController::class, 'homePrivacySave'])->name('page.homePrivacySave');

    //Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

    Route::resource('game', GameController::class);

    Route::resource('new-page', NewPageController::class);

    Route::resource('socials', SocialController::class);
    Route::resource('newsletters', NewsletterController::class);

    Route::get('newsletter/delete/{id}', [NewsletterController::class, 'del'])->name('newsletter.del');

    Route::post('ckeditor-upload', [AdminController::class, 'ckeditorUpload'])->name('ckeditor.upload');
    Route::post('/summernote/upload', [AdminController::class, 'summernoteUpload'])->name('summernote.upload');

    Route::get('/admin/user-list',[DashboardController::class,'userList'])->name('admin.user-list');
    Route::get('/admin/spin-winner-list',[DashboardController::class,'winlist'])->name('admin.spin-winner-list-list');

    Route::resource('game-case', GameCaseController::class);
    Route::resource('skin', SkinController::class);
    Route::resource('user-point', UserPointController::class);
});


require __DIR__ . '/auth.php';
