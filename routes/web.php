<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\CompareComponent;
use App\Http\Livewire\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomepageBannerFirstLeftComponent;
use App\Http\Livewire\Admin\AdminAddHomepageBannerFirstLeftComponent;
use App\Http\Livewire\Admin\AdminEditHomepageBannerFirstLeftComponent;
use App\Http\Livewire\Admin\AdminHomepageBannerFirstRightComponent;
use App\Http\Livewire\Admin\AdminAddHomepageBannerFirstRightComponent;
use App\Http\Livewire\Admin\AdminEditHomepageBannerFirstRightComponent;
use App\Http\Livewire\Admin\AdminHomepageBannerSecondComponent;
use App\Http\Livewire\Admin\AdminAddHomepageBannerSecondComponent;
use App\Http\Livewire\Admin\AdminEditHomepageBannerSecondComponent;
use App\Http\Livewire\Admin\AdminShoppageBannerComponent;
use App\Http\Livewire\Admin\AdminAddShoppageBannerComponent;
use App\Http\Livewire\Admin\AdminEditShoppageBannerComponent;
use App\Http\Livewire\Admin\AdminPopupComponent;
use App\Http\Livewire\Admin\AdminAddPopupComponent;
use App\Http\Livewire\Admin\AdminEditPopupComponent;
use App\Http\Livewire\Admin\SubscriberComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminAttributesComponent;
use App\Http\Livewire\Admin\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\AdminEditAttributeComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');

Route::get('/shop',ShopComponent::class);

Route::get('/compare',CompareComponent::class)->name('compare');

Route::get('/cart',CartComponent::class)->name('product.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us',ContactComponent::class)->name('contact');

Route::get('/about-us',AboutComponent::class)->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//For User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password',UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editprofile');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');



    Route::get('/admin/homepageBannerFirstLeft',AdminHomepageBannerFirstLeftComponent::class)->name('admin.homepageBannerFirstLeft');
    Route::get('/admin/homepageBannerFirstLeft/add',AdminAddHomepageBannerFirstLeftComponent::class)->name('admin.addhomepageBannerFirstLeft');
    Route::get('/admin/homepageBannerFirstLeft/edit/{homepage_banner_first_left}',AdminEditHomepageBannerFirstLeftComponent::class)->name('admin.edithomepageBannerFirstLeft');


    Route::get('/admin/homepageBannerFirstRight',AdminHomepageBannerFirstRightComponent::class)->name('admin.homepageBannerFirstRight');
    Route::get('/admin/homepageBannerFirstRight/add',AdminAddHomepageBannerFirstRightComponent::class)->name('admin.addhomepageBannerFirstRight');
    Route::get('/admin/homepageBannerFirstRight/edit/{homepage_banner_first_right}',AdminEditHomepageBannerFirstRightComponent::class)->name('admin.edithomepageBannerFirstRight');


    Route::get('/admin/homepageBannerSecond',AdminHomepageBannerSecondComponent::class)->name('admin.homepageBannerSecond');
    Route::get('/admin/homepageBannerSecond/add',AdminAddHomepageBannerSecondComponent::class)->name('admin.addhomepageBannerSecond');
    Route::get('/admin/homepageBannerSecond/edit/{homepage_banner_second}',AdminEditHomepageBannerSecondComponent::class)->name('admin.edithomepageBannerSecond');


    Route::get('/admin/shoppageBanner',AdminshoppageBannerComponent::class)->name('admin.shoppageBanner');
    Route::get('/admin/shoppageBanner/add',AdminAddshoppageBannerComponent::class)->name('admin.addshoppageBanner');
    Route::get('/admin/shoppageBanner/edit/{shoppage_Banner_id}',AdminEditshoppageBannerComponent::class)->name('admin.editshoppageBanner');


    Route::get('/admin/Popup',AdminPopupComponent::class)->name('admin.Popup');
    Route::get('/admin/Popup/add',AdminAddPopupComponent::class)->name('admin.addPopup');
    Route::get('/admin/Popup/edit/{Popup_id}',AdminEditPopupComponent::class)->name('admin.editPopup');

    Route::get('/admin/subscriber',SubscriberComponent::class)->name('admin.subscriber');



    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.settings');

    Route::get('/admin/attributes', AdminAttributesComponent::class)->name('admin.attributes');
    Route::get('/admin/attribute/add', AdminAddAttributeComponent::class)->name('admin.add_attribute');
    Route::get('/admin/attribute/edit/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.edit_attribute');
});
