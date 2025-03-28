@extends('master')

@section('content')

<section class="cart-products-section">
    <div class="container">
        {{-- <a href="index.html" class="continue-shopping-btn"> --}}
            <a href="{{url('/')}}" class="continue-shopping-btn">
            <i class="fas fa-long-arrow-alt-left"></i>
            Continue Shopping
        </a>
        <div class="cart-products-wrapper">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>Product Name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>remove</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($cartProducts as $cart)
                   <tr>
                    <td class="cart-product-image-outer">
                        {{-- <img src="./assets/images/product.png" height="70" width="120"> --}}
                        <img src="{{asset('backend/images/product/'.$cart->product->image)}}" height="70" width="120">
                        
                    </td>
                    <td class="cart-product-name-outer">
                        {{-- Test Product --}}
                        {{$cart->product->name}}
                    </td>
                    <td class="cart-product-price-outer">
                        {{-- ৳ 300 {{$cart->product->name}} no need  --}}
                        ৳ {{$cart->price}}
                    </td>
                    <td class="qty-increment-decrement-outer">
                        {{-- <input type="number" name="qty" readonly value="300" min="1" /> --}}
                        <input type="number" name="qty" readonly value="{{$cart->qty}}" min="1" />
                    </td>
                    <td>
                        {{-- <a href="#" class="remove-product">Remove</a> --}}
                        <a href="{{url('cart-delete/'.$cart->id)}}" class="remove-product">Remove</a>
                    </td>
                    <td class="cart-product-total-outer">
                        {{-- ৳ 300 --}}
                        ৳ {{$cart->qty*$cart->price}}
                    </td>
                </tr>
                   @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {{-- <a href="checkout.html" class="process-checkout-btn"> --}}
                <a href="{{url('/checkout')}}" class="process-checkout-btn">
                Proceed To CheckOut
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</section>

@endsection