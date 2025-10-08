<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Shipping;
use App\Models\Wishlist;
use Illuminate\Support\Str;

// use Auth;
class Helper
{
    /**
     * Check if cart and checkout functionality is enabled
     *
     * @return bool
     */
    public static function isCartCheckoutEnabled()
    {
        $settings = Settings::first();

        return $settings && $settings->enable_cart_checkout;
    }

    /**
     * Check if wishlist functionality is enabled
     *
     * @return bool
     */
    public static function isWishlistEnabled()
    {
        $settings = Settings::first();

        return $settings && $settings->enable_wishlist;
    }

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }

    public static function getAllCategory()
    {
        $category = new Category;
        $menu = $category->getAllParentWithChild();

        return $menu;
    }

    public static function getHeaderCategory()
    {
        $category = new Category;
        // dd($category);
        $menu = $category->getAllParentWithChild();
        // dd($menu);
        if ($menu) {
            ?>
            <li class="submenu">
                <a href="javascript:;">Catégories</a>
                <ul>
                    <?php
                        foreach ($menu as $cat_info) {
                    ?>
                         <li><a href="<?php echo route('product-grids', ['category' => $cat_info->slug]); ?>"><?php echo $cat_info->title; ?></a></li>   
                    <?php
                        }
                    ?>
                </ul>
            </li>
            <?php
        }
    }

    public static function productCategoryList($option = 'all')
    {
        if ($option = 'all') {
            return Category::orderBy('id', 'DESC')->get();
        }

        return Category::has('products')->orderBy('id', 'DESC')->get();
    }

    public static function postTagList($option = 'all')
    {
        if ($option = 'all') {
            return PostTag::orderBy('id', 'desc')->get();
        }

        return PostTag::has('posts')->orderBy('id', 'desc')->get();
    }

    public static function postCategoryList($option = 'all')
    {
        if ($option = 'all') {
            return PostCategory::orderBy('id', 'DESC')->get();
        }

        return PostCategory::has('posts')->orderBy('id', 'DESC')->get();
    }

    public static function getTopProductsByCategory($categoryId)
    {
        return Product::where('cat_id', $categoryId)
            ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
    }

    /**
     * Get list of all categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getCategoriesList()
    {
        return Category::orderBy('title', 'asc')->take(3)->get();
    }

    /**
     * Get list of all product ranges
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getProductRangesList()
    {
        return \App\Models\ProductRange::orderBy('sort_order', 'asc')->get();
    }

    // Cart Count
    public static function cartCount($user_id = '')
    {

        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('quantity');
        } else {
            return 0;
        }
    }

    // relationship cart with product
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public static function getAllProductFromCart($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::with('product')->where('user_id', $user_id)->where('order_id', null)->get();
        } else {
            return 0;
        }
    }

    // Total amount cart
    public static function totalCartPrice($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    // Wishlist Count
    public static function wishlistCount($user_id = '')
    {

        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Wishlist::where('user_id', $user_id)->where('cart_id', null)->sum('quantity');
        } else {
            return 0;
        }
    }

    public static function getAllProductFromWishlist($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Wishlist::with('product')->where('user_id', $user_id)->where('cart_id', null)->get();
        } else {
            return 0;
        }
    }

    public static function totalWishlistPrice($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Wishlist::where('user_id', $user_id)->where('cart_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id, $user_id)
    {
        $order = Order::find($id);
        dd($id);
        if ($order) {
            $shipping_price = (float) $order->shipping->price;
            $order_price = self::orderPrice($id, $user_id);

            return number_format((float) ($order_price + $shipping_price), 2, '.', '');
        } else {
            return 0;
        }
    }

    // Admin home
    public static function earningPerMonth()
    {
        $month_data = Order::where('status', 'delivered')->get();
        // return $month_data;
        $price = 0;
        foreach ($month_data as $data) {
            $price = $data->cart_info->sum('price');
        }

        return number_format((float) ($price), 2, '.', '');
    }

    public static function shipping()
    {
        return Shipping::orderBy('id', 'DESC')->get();
    }
}

if (! function_exists('generateUniqueSlug')) {
    /**
     * Generate a unique slug for a given title and model.
     *
     * @param  string  $title
     * @param  string  $modelClass
     * @return string
     */
    function generateUniqueSlug($title, $modelClass)
    {
        $slug = Str::slug($title);
        $count = $modelClass::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug.'-'.date('ymdis').'-'.rand(0, 999);
        }

        return $slug;
    }
}

?>