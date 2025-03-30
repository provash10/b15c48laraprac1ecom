@extends('master')

@section('content')

<section class="product-page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-page-header-wrapper">
                            <div class="left-side-box">
                                <h4 class="title">
                                    {{-- Products --}}
                                    {{$category->name}} Products
                                </h4>
                            </div>
                            <div class="right-side-box">
                                <h4 class="product-qty">
                                    Total Products
                                    {{-- <span class="number">40</span> --}}
                                    <span class="number">{{$productsCount}}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item-outer">
                            <div class="product__item-image-outer">
                                {{-- <a href="#" class="product__item-image-inner"> --}}
                                    <a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
                                    {{-- <img src="./assets/images/product.png" alt="Product Image" /> --}}
                                    <img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
                                </a>
                                <div class="product__item-add-cart-btn-outer">
                                    {{-- <a href="#" class="product__item-add-cart-btn-inner"> --}}
                                        <a href="{{url('add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
                                        Add to Cart
                                    </a>
                                </div>
                                <div class="product__type-badge-outer">
                                    <span class="product__type-badge-inner">
                                       {{-- Hot --}}
                                       {{ucfirst($product->product_type)}}
                                    </span>
                                </div>
                            </div>
                            <div class="product__item-info-outer">
                                {{-- <a href="#" class="product__item-name"> --}}
                                    <a href="{{url('product-details/'.$product->slug)}}" class="product__item-name">
                                    {{-- Test Product --}}
                                    {{$product->name}}
                                </a>
                                <div class="product__item-price-outer">
                                    @if ($product->discount_price != null)
                                    <div class="product__item-discount-price">
                                        {{-- <del>400 Tk.</del> --}}
                                        <del>{{$product->regular_price}} Tk.</del>
                                    </div>
                                    <div class="product__item-regular-price">
                                        {{-- <span>300 Tk.</span> --}}
                                        <span>{{$product->discount_price}} Tk.</span>
                                    </div>

                                    @elseif ($product->discount_price == null)
                                    <div class="product__item-regular-price">
                                        {{-- <span>300 Tk.</span> --}}
                                        <span>{{$product->regular_price}} Tk.</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section> 

@endsection 