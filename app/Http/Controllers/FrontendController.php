<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
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
    public function shop(Request $request){

        if(isset($request->cat_id)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->cat_id)->get();
        }

        elseif(isset($request->sub_cat_id)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->sub_cat_id)->get();
        }

        else{
            $products = Product::orderBy('id', 'desc')->get();
        }

        //No Need $cateories and $subCategories->AppServiceProvider 
        // $categories = Category::get();

        // $products = Product::orderBy('id', 'desc')->get();
        
        // $productsCount = Product::count();
        $productsCount = $products->count();
        // $productsCount = Product::orderBy('id','desc')->count();
        // $productsCount = $products->orderBy('id','desc')->count();

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

    // searchProducts
    public function searchProducts(Request $request){
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();

        // dd ($products); 
        $productsCount = $products->count();
        return view('search-products', compact('products','productsCount'));
    }

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

// Confirm Order........Invoiced
public function confirmOrder (Request $request){
    $order = new Order();

    $previousOrder = Order::orderBy('id','desc')->first();
    if($previousOrder == null){
        $generateInvoice = "XYZ-1";
        $order->invoiceID =$generateInvoice;

        // $order->invoiceID = "XYZ-1";
    }
    else{
        $generateInvoice = "XYZ-".$previousOrder->id+1;
        $order->invoiceID = $generateInvoice;

        // $order->invoiceID = "XYZ-" . $previousOrder->id +1;

        // $order->invoiceId = ("XYZ-" . $previousOrder->id) + 1;
        // $order->invoiceId = "XYZ-" . ($previousOrder->id + 1);

    }

    $order->c_name = $request->c_name;
    $order->c_phone = $request->c_phone;
    $order->address = $request->address;
    $order->area = $request->area;

    // Total Price
    $order->price = $request->grandTotalHidden;

    $cartProducts = Cart::where('ip_address', $request->ip())->get();
    // dd($cartProducts);
    if($cartProducts->isNotEmpty()){
        $order->save();

        foreach($cartProducts as $cart){
            $orderDetails = new OrderDetails();

            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $cart->product_id;
            $orderDetails->size = $cart->size;
            $orderDetails->color = $cart->color;
            $orderDetails->qty = $cart->qty;
            $orderDetails->price = $cart->price;

            $orderDetails->save();
            $cart->delete();
        }
    }

    else{
        return redirect()->back();
    }

    // return redirect()->back();
    // return redirect('/order-confirmed/{invoiceId}');
    return redirect('order-confirmed/'.$generateInvoice);
}

public function thankyou($invoiceId){
    // return view('thankyou');
    return view('thankyou', compact('invoiceId'));
}
}
