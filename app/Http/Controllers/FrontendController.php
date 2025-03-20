<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $hotProducts = Product::where('product_type','hot')->get();
        $newProducts = Product::where('product_type','new')->get();
        $regularProducts = Product::where('product_type','regular')->get();
        $discountProducts = Product::where('product_type','discount')->get();
        
        return view('index',compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts'));
    }
    public function shop(){
        return view('shop');
    }

    public function returnProcess(){
        return view('return-process');
    }

    public function categoryProducts(){
        return view('category-products');
    }

    public function subcategoryProducts(){
        return view('subcategory-products');
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

//    product details

public function productDetails(){
    return view('product-details');
}

//view all
public function typeProducts(){
    return view('type-products');
}

}
