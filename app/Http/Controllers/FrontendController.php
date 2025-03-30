<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $hotProducts = Product::where('product_type','hot')->orderBy('id','desc')->get();
        $newProducts = Product::where('product_type','new')->orderBy('id','desc')->get();
        $regularProducts = Product::where('product_type','regular')->orderBy('id','desc')->get();
        $discountProducts = Product::where('product_type','discount')->orderBy('id','desc')->get();
        
        // from function  productDetails
        $categories = Category::orderBy('id','desc')->get();
        return view('index',compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts', 'categories'));
    }
    public function shop(){
        //No Need $cateories and $subCategories->AppServiceProvider 
        // $categories = Category::get();

        $products = Product::orderBy('id', 'desc')->get();
        $productsCount = Product::orderBy('id','desc')->count();
        return view('shop', compact('products', 'productsCount'));
    }

    public function returnProcess(){
        return view('return-process');
    }

    public function categoryProducts ($id){

        $products = Product::where('cat_id',$id)->get();
        // $products = Product::where('cat_id',$id)->with('category')->get();
        // dd($products);
        $productsCount = Product::where('cat_id',$id)->count();
        $category = Category::find($id);
        return view('category-products', compact('products','category','productsCount'));
    }

    public function subcategoryProducts($id){
        $products = Product::where('sub_cat_id',$id)->get();
        // $products = Product::where('cat_id',$id)->with('category')->get();
        // dd($products);
        $productsCount = Product::where('sub_cat_id',$id)->count();
        $subCategory = SubCategory::find($id);
        return view('subcategory-products', compact('products', 'subCategory','productsCount'));
    }

    // public function viewCart(){
    //     $carts = Cart::where('ip_address', request()->ip())->with('product')->get();
    //     return view('view-cart', compact('carts'));
    // }

    public function viewCart(){
        return view('view-cart');
    }
    public function checkOut (){
        return view('checkout');
    }

    // policy pages
    public function privacyPolicy(){
        return view('privacy-policy');
    }

   public function termsConditions(){
    return view('terms-conditions');
   }

   public function refundPolicy(){
    return view('refund-policy');
   }

   public function paymentPolicy(){
    return view('payment-policy');
   }

   public function aboutUs(){
    return view('about-us');
   }

   public function contactUs(){
    return view('contact-us');
   }

//    product details  use slug >>> $id

public function productDetails($slug){

    // $product = Product::find($id);
    
    $product = Product::with('color','size','galleryImage','review')->where('slug', $slug)->first();
    // dd($product);
    $categories = Category::orderBy('id','desc')->get();
    return view('product-details', compact('product', 'categories'));
}

//view all
public function typeProducts($type){
    $products = Product::where('product_type', $type)->get();
    // dd($products);
    $productsCount = Product::where('product_type', $type)->count();
    return view('type-products', compact('products', 'type', 'productsCount'));
}

// Cart Function 

public function addToCart (Request $request, $id){
    $cartProduct = Cart::where('product_id', $id)->where('ip_address',$request->ip())->orderBy('id', 'desc')->first();
    // dd($cartProduct);
    $product = Product::find($id);
    // dd($product);

    if($cartProduct == null){
        $cart = new Cart();
    $cart->ip_address = $request->ip();
    $cart->product_id = $product->id;
    $cart->qty = 1;

    // $cart->price = $product->discount_price;

    if($product->discount_price == null){
        $cart->price = $product->regular_price;
    }
    elseif($product->discount_price !== null){
        $cart->price = $product->discount_price;
    }

    $cart->save();
    }

    elseif($cartProduct !== null){
        $cartProduct->qty = $cartProduct->qty+1;
        // $cartProduct->qty += 1;
        $cartProduct->save();
    }

    return redirect()->back();
}

        // Add to Cart Details Page 
public function addToCartDetails (Request $request, $id){
    $cartProduct = Cart::where('product_id', $id)->where('ip_address',$request->ip())->orderBy('id', 'desc')->first();
    // dd($cartProduct);
    $product = Product::find($id);
    // dd($product);

    if($cartProduct == null){
        $cart = new Cart();
    $cart->ip_address = $request->ip();
    $cart->product_id = $product->id;
    // $cart->qty = 1;
    $cart->qty = $request->qty;
    $cart->color = $request->color;
    $cart->size = $request->size;

    // $cart->price = $product->discount_price;

    if($product->discount_price == null){
        $cart->price = $product->regular_price;
    }
    elseif($product->discount_price !== null){
        $cart->price = $product->discount_price;
    }

    $cart->save();
    }

    elseif($cartProduct !== null){
        // $cartProduct->qty = $cartProduct->qty+1;
        $cartProduct->qty = $cartProduct->qty + $request->qty;
        // $cartProduct->qty += 1;
        $cartProduct->color = $request->color;
        $cartProduct->size = $request->size;
        $cartProduct->save();
    }

    if($request->action =="addToCart"){
        return redirect()->back();
    }

    elseif($request->action =="buyNow"){
        return redirect('/checkout');
    }
    // return redirect()->back();
}

// AddToCartDelete
public function addToCartDelete ($id){
    $cart = Cart::find($id);
    $cart->delete();

    return redirect()->back();
}
}
