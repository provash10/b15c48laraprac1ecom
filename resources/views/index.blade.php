{{-- @include('master') --}}
{{-- @dd($topBanners) --}}
{{-- @dd($termPolicy) --}}

@extends('master')

@section('content')


	<!-- /Home Slider -->
	<section class="home-slider-section">
		<div class="container">
			<div class="home__slider-sec-wrap">
				<div class="home__category-outer">
					<ul class="header__category-list">
						@foreach ($categoriesGlobal as $category)
						<li class="header__category-list-item item-has-submenu">
							{{-- <a href="category-product.html" class="header__category-list-item-link"> --}}
								{{-- <a href="{{url('category-products')}}" class="header__category-list-item-link"> --}}
									<a href="{{url('category-products/'.$category->id)}}" class="header__category-list-item-link">
										
								{{-- <img src="{{asset('/assets/images/product.png')}}" alt="category"> --}}
								<img src="{{asset('backend/images/category/'.$category->image)}}" alt="category">
								{{-- Test Category --}}
								{{$category->name}}
							</a>
							<ul class="header__nav-item-category-submenu">
								@foreach ($category->subCategory as $subCat)
								<li class="header__category-submenu-item">
									{{-- <a href="sub-category-product.html" class="header__category-submenu-item-link"> --}}
										{{-- <a href="{{url('subcategory-products')}}" class="header__category-submenu-item-link"> --}}
											<a href="{{url('subcategory-products/'.$subCat->id)}}" class="header__category-submenu-item-link">
										{{-- Test Subcategory --}}
										{{$subCat->name}}
									</a>
								</li>
								@endforeach
							</ul>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="home__slider-items-wrapper">
					<div class="home__slider-item-outer">
						{{-- <img src="{{asset('/assets/images/slider.jpg')}}" alt="image" class="home__slider-item-image"> --}}
						<img src="{{asset('backend/images/setting/'.$siteSettings->banner)}}" alt="image" class="home__slider-item-image">
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Home Slider -->

	<!-- Categoris Slider -->
	<section class="categoris-slider-section">
		<div class="container">
			<div class="section-title-outer">
				<h1 class="title">
					Categories
				</h1>
			</div>
			<div class="categoris-items-wrapper owl-carousel">
				@foreach ($categories as $category)
				{{-- <a href="{{url('/category-products/')}}" class="categoris-item"> --}}
					{{-- <a href="{{url('/category-products/{id}')}}" class="categoris-item"> --}}
						<a href="{{url('category-products/'.$category->id)}}" class="categoris-item">
					{{-- <img src="{{asset('/assets/images/product.png')}}" alt="category" /> --}}
					<img src="{{asset('backend/images/category/'.$category->image)}}" alt="category" />
					<h6 class="categoris-name">
						{{-- Test Category --}}
						{{$category->name}}
					</h6>
					{{-- <span class="items-number">8 items</span> --}}
					<span class="items-number">{{App\Models\Product::where('cat_id',$category->id)->count()}}</span>
				</a>
				@endforeach
			</div>
		</div>
	</section>
	<!-- /Categoris Slider -->
	<!-- Banner -->
	<section class="banner-section">
		<div class="container">
			<div class="row">
				@foreach ($topBanners as $banner)
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="banner-item-outer">
						{{-- <img src="{{asset('/assets/images/banner.jpeg')}}" alt="banner image" /> --}}
						{{-- <img src="{{asset('backend/images/banners/'.$banner->banner_image)}}" alt="banner image" /> --}}
						<img src="{{asset('backend/images/setting/'.$banner->banner_image)}}" alt="image" class="home__slider-item-image">
					</div>
				</div>
				@endforeach
				{{-- Remove banners and use loop  --}}
				{{-- <div class="col-lg-4 col-md-6 col-sm-6">
					<div class="banner-item-outer">
						<img src="./assets/images/banner.jpeg" alt="banner image" />
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="banner-item-outer">
						<img src="{{asset('/assets/images/banner.jpeg')}}" alt="banner image" />
					</div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- /Banner -->
	<!-- Popular Product -->
	<section class="product-section">
		<div class="container">
			<div class="section-title-outer">
				<h1 class="title">
					Hot Products
				</h1>
				{{-- <a href="{{url('/type-products')}}" class="product-view-all-btn"> --}}
					<a href="{{url('/type-products/hot')}}" class="product-view-all-btn">
					View All
				</a>
			</div>
			<div class="product-items-wrapper">
				@foreach ($hotProducts as $product )
				<div class="product__item-outer">
					<div class="product__item-image-outer">
						{{-- <a href="{{url('product-details/'.$product->id)}}" class="product__item-image-inner"> --}}
							<a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
							{{-- <img src="{{asset('/assets/images/product.png')}}" alt="Product Image" /> --}}
							<img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							{{-- <a href="{{url('/add-to-cart/{id}')}}" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a> --}}
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
							<a href="{{url('/product-detials/'.$product->slug)}}" class="product__item-name">
							{{-- Test Product --}}
							{{$product->name}}
						</a>
						<div class="product__item-price-outer">
							<div class="product__item-discount-price">
								{{-- <del>400 Tk.</del> --}}
								<del>{{$product->regular_price}}</del>
							</div>
							<div class="product__item-regular-price">
								{{-- <span>300 Tk.</span> --}}
								<span>{{$product->discount_price}}</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach

				{{-- Delete This 2 div --}}
				{{-- <div class="product__item-outer">
					<div class="product__item-image-outer">
						<a href="{{url('product-details')}}" class="product__item-image-inner">
							<img src="{{asset('/assets/images/product.png')}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							<a href="" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a>
						</div>
						<div class="product__type-badge-outer">
							<span class="product__type-badge-inner">
								Hot
							</span>
						</div>
					</div>
					<div class="product__item-info-outer">
						<a href="{{url('product-details')}}" class="product__item-name">
							Test Product
						</a>
						<div class="product__item-price-outer">
							<div class="product__item-discount-price">
								<del>400 Tk.</del>
							</div>
							<div class="product__item-regular-price">
								<span>300 Tk.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="product__item-outer">
					<div class="product__item-image-outer">
						<a href="{{url('product-details')}}" class="product__item-image-inner">
							<img src="{{asset('/assets/images/product.png')}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							<a href="l" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a>
						</div>
						<div class="product__type-badge-outer">
							<span class="product__type-badge-inner">
								Hot
							</span>
						</div>
					</div>
					<div class="product__item-info-outer">
						<a href="{{url('product-details')}}" class="product__item-name">
							Test Product
						</a>
						<div class="product__item-price-outer">
							<div class="product__item-discount-price">
								<del>400 Tk.</del>
							</div>
							<div class="product__item-regular-price">
								<span>300 Tk.</span>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- /Popular Product -->
	<!-- Popular Product -->
	<section class="product-section">
		<div class="container">
			<div class="section-title-outer">
				<h1 class="title">
					New Arrival
				</h1>
				{{-- <a href="{{url('/type-products')}}" class="product-view-all-btn"> --}}
					<a href="{{url('/type-products/new')}}" class="product-view-all-btn">
					View All
				</a>
			</div>
			<div class="product-items-wrapper">
				@foreach ( $newProducts as $product)
				<div class="product__item-outer">
					<div class="product__item-image-outer">
						<a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
							{{-- <img src="{{asset('/assets/images/product1.jpg')}}" alt="Product Image" /> --}}
							<img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							<a href="{{url('/add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a>
						</div>
						<div class="product__type-badge-outer">
							<span class="product__type-badge-inner">
								{{-- New --}}
								{{ucfirst($product->product_type)}}
							</span>
						</div>
					</div>
					<div class="product__item-info-outer">
						<a href="{{url('product-details/'.$product->slug)}}" class="product__item-name">
							{{-- Test Product --}}
							{{$product->name}}
						</a>
						<div class="product__item-price-outer">
							@if ($product->discount_price != null)
							<div class="product__item-discount-price">
								{{-- <del>400 Tk.</del> --}}
								<del>{{$product->regular_price}}</del>
							</div>

							<div class="product__item-regular-price">
								<span>{{$product->discount_price}}.</span>
							</div>
							
							@elseif ($product->discount_price == null)
							<div class="product__item-regular-price">
								{{-- <span>{{$product->discount_price}}.</span> --}}
								<span>{{$product->regular_price}}.</span>
							</div>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- /Popular Product -->
	<!-- Popular Product -->
	<section class="product-section">
		<div class="container">
			<div class="section-title-outer">
				<h1 class="title">
					Regular Products
				</h1>
				{{-- <a href="{{url('/type-products')}}" class="product-view-all-btn"> --}}
					<a href="{{url('/type-products/regular')}}" class="product-view-all-btn">
					View All
				</a>
			</div>
			<div class="product-items-wrapper">
				@foreach ( $regularProducts as $product )
				<div class="product__item-outer">
					<div class="product__item-image-outer">
						<a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
							{{-- <img src="{{asset('/assets/images/product.png')}}" alt="Product Image" /> --}}
							<img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							<a href="{{url('/add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a>
						</div>
						<div class="product__type-badge-outer">
							<span class="product__type-badge-inner">
								{{-- Regular --}}
								{{ucfirst($product->product_type)}}
							</span>
						</div>
					</div>
					<div class="product__item-info-outer">
						<a href="{{url('product-details/'.$product->slug)}}" class="product__item-name">
							{{-- Test Product --}}
							{{$product->name}}
						</a>
						<div class="product__item-price-outer">
							{{-- <div class="product__item-discount-price">
								<del>{{$product->regular_price}}</del>
							</div>
							<div class="product__item-regular-price">
								<span>{{$product->discount_price}}</span>
							</div> --}}
							@if ($product->discount_price != null)
							<div class="product__item-discount-price">
								{{-- <del>400 Tk.</del> --}}
								<del>{{$product->regular_price}}</del>
							</div>

							<div class="product__item-regular-price">
								<span>{{$product->discount_price}}.</span>
							</div>
							
							@elseif ($product->discount_price == null)
							<div class="product__item-regular-price">
								{{-- <span>{{$product->discount_price}}.</span> --}}
								<span>{{$product->regular_price}}.</span>
							</div>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- /Popular Product -->
	<!-- Popular Product -->
	<section class="product-section">
		<div class="container">
			<div class="section-title-outer">
				<h1 class="title">
					Discount Products
				</h1>
				{{-- <a href="{{url('/type-products')}}" class="product-view-all-btn"> --}}
					<a href="{{url('/type-products/discount')}}" class="product-view-all-btn">
					View All
				</a>
			</div>
			<div class="product-items-wrapper">
				@foreach ($discountProducts as $product )
				<div class="product__item-outer">
					<div class="product__item-image-outer">
						<a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
							{{-- <img src="{{asset('/assets/images/product1.jpg')}}" alt="Product Image" /> --}}
							<img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
						</a>
						<div class="product__item-add-cart-btn-outer">
							<a href="{{url('/add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
								Add to Cart
							</a>
						</div>
						<div class="product__type-badge-outer">
							<span class="product__type-badge-inner">
								{{-- Discount --}}
								{{ucfirst($product->product_type)}}
							</span>
						</div>
					</div>
					<div class="product__item-info-outer">
						{{-- <a href="{{url('product-details')}}" class="product__item-name"> --}}
							<a href="{{url('product-details/'.$product->slug)}}" class="product__item-name">
							{{-- Test Product --}}
							{{$product->name}}
						</a>
						<div class="product__item-price-outer">
							@if ($product->discount_price != null)
							<div class="product__item-discount-price">
							{{-- <del>400 Tk.</del> --}}
								<del>{{$product->regular_price}}</del>
							</div>

							<div class="product__item-regular-price">
								<span>{{$product->discount_price}}.</span>
							</div>
							
							@elseif ($product->discount_price == null)
							<div class="product__item-regular-price">
								{{-- <span>{{$product->discount_price}}.</span> --}}
								<span>{{$product->regular_price}}.</span>
							</div>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- /Popular Product -->


@endsection