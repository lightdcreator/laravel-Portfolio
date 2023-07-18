<?php

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Home\HomeSliderController;

Route::get('/', function () {
    return view('frontend.index');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// Home page Slide
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

// About Page

Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');

    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/about/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');

    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});



//Portfolio

Route::controller(PortfolioController::class)->group(function () {

    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');

    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');

    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');

    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
});


Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');

    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');

    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');

    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');

    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});

// Blog All Route
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

    Route::get('/blog', 'HomeBlog')->name('home.blog');
});

//Footer Route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
});


//Contact Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
