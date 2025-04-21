@extends('master')

@section('content')

<section class="product-page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-items-wrapper">
                    <div class="res_filter-items-top-outer">
                        <h3 class="res_filter-items-top-title">Filters</h3>
                    </div>
                    <div class="filter-items-outer">
                        <div class="label">
                            <span>categories</span>
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <form class="filter-items" id="collapseOne" action="{{url('/shop')}}" method="GET">
                            @csrf                                    
                            @foreach ($categoriesGlobal as $category)
                            <div class="item-label">
                                <label>
                                    {{-- <input type="checkbox" value="" id="" name="" class="checkbox" /> --}}
                                    <input type="checkbox" value="{{$category->id}}" id="cat_id" onclick="formSubmitCategory()" name="cat_id" class="checkbox" />
                                    {{-- <span>Hot Products</span> --}}
                                    <span>{{$category->name}}</span>
                                </label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="filter-items-outer">
                        <div class="label">
                            <span>sub categories</span>
                            <i class="fas fa-angle-down"></i>
                        </div>
                        {{-- <form class="filter-items" id="collapseTwo" action="" method="GET"> --}}
                            <form class="filter-items" id="collapseTwo" action="{{url('/shop')}}" method="GET">
                                @csrf
                           @foreach ($subCategoriesGlobal as $subCategory)
                           <div class="item-label">
                            <label>
                                {{-- <input type="checkbox" value="" id="" name="" class="checkbox" /> --}}
                                <input type="checkbox" value="{{$subCategory->id}}" id="sub_cat_id" onclick="formSubmitSubCategory()" name="sub_cat_id" class="checkbox" />
                                <span>
                                    {{-- Test Subcategory --}}
                                    {{$subCategory->name}}
                                </span>
                            </label>
                        </div>
                           @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-page-header-wrapper">
                            <div class="left-side-box">
                                <h4 class="title">
                                    Shop Products
                                </h4>
                            </div>
                            <div class="right-side-box">
                                <h4 class="product-qty">
                                    Total Products
                                    {{-- <span class="number">10</span> --}}
                                    <span class="number">{{$productsCount}}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    {{-- use loop  --}}
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item-outer">
                            <div class="product__item-image-outer">
                                {{-- <a href="#" class="product__item-image-inner"> --}}
                                    <a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
                                    {{-- <img src="./assets/images/product.png" alt="Product Image" /> --}}
                                    <img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
                                </a>
                                <div class="product__item-add-cart-btn-outer">
                                    {{-- <a href="#" class="product__item-add-cart-btn-inner"> --}}
                                        <a href="{{url('/add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
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
                                @if ($product->discount_price != null)
                                <div class="product__item-price-outer">
                                    <div class="product__item-discount-price">
                                        {{-- <del>400 Tk.</del> --}}
                                        <del>{{$product->regular_price}}</del>
                                    </div>
                                    <div class="product__item-regular-price">
                                        {{-- <span>300 Tk.</span> --}}
                                        <span>{{$product->discount_price}} Tk.</span>
                                    </div>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> 

@endsection

@push('script')
    <script>
        function formSubmitCategory(){
            document.getElementById('collapseOne').submit();
        }

        function formSubmitSubCategory(){
            document.getElementById('collapseTwo').submit();
        }
    </script>
@endpush