<div>
    <div>

        

    <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap" style="margin-bottom: 50px;">
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
            <div class="carousel-inner">

                @foreach($sliders as $key=>$slide)
                <div class="carousel-item {{$key ==0 ? 'active':''}} background_bg" data-img-src="{{ asset('assets/images/sliders') }}/{{$slide->image}}" wire:ignore>
                    <div class="banner_slide_content">
                        <div class="container">
                            <!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-7 col-9">
                                    <div class="banner_content overflow-hidden">
                                        <h5 class="mb-3 font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{$slide->subtitle}}</h5>
                                        <h2 data-animation="slideInLeft" data-animation-delay="1s">{{$slide->title}}</h2>
                                        <a class="btn btn-fill-out rounded-0  text-uppercase" href="{{$slide->link}}" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
        </div>
    </div>
</div>


<div class="main_content">
    <div class=" pb_20">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <img src="{{asset('assets/icons/delivery.png')}}" alt="" width="46" height="46">
                        </div>
                        <div class="icon_box_content">
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <img src="{{asset('assets/icons/money.png')}}" alt="" width="46" height="46">
                        </div>
                        <div class="icon_box_content">
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <img src="{{asset('assets/icons/megaphone.png')}}" alt="" width="46" height="46">
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Exclusive start --}}

<div>
    <div class="section pb_20" style="margin-bottom: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Exclusive Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        @foreach ($categories as $key=>$category)
                            <li class="nav-item">
                                    <a class="nav-link {{$key == 0 ? 'active':''}}" id="#category_{{$category->id}}" data-toggle="tab" href="#category_{{$category->id}}" role="tab" aria-controls="category_{{$category->id}}" aria-selected="true">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                

                <div class="tab-content">
                    @foreach ($categories as $key=>$category)
                        <div class="tab-pane fade show {{$key ==0 ? 'active':''}}" id="category_{{$category->id}}" role="tabpanel" aria-labelledby="category_{{$category->id}}">
                        <div class="row">

                            @php
                                $c_products = App\Models\Product::where('category_id',$category->id)->get()->take($no_of_products);
                            @endphp

                            @php
                               $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp

                            @php
                               $cart = Cart::instance('cart')->content()->pluck('id');
                            @endphp

                            @php
                               $compare = Cart::instance('compare')->content()->pluck('id');
                            @endphp

                            @foreach ($c_products as $c_product)
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="">
                                            <img src="{{ asset('assets/images/products') }}/{{$c_product->image}}" alt="{{$c_product->name}}">
                                        </a>
                                        <div class="product_action_box" >
                                            <ul class="list_none pr_action_btn">


                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <li class="add-to-cart">
                                                    <a href="" wire:click.prevent="store({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                @else
                                                <li class="add-to-cart">
                                                    <a href="" wire:click.prevent="store({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->regular_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                @endif


                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <li><a href="" wire:click.prevent="addToWishlist({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-heart"></i></a></li>
                                                @else
                                                    <li><a href="" wire:click.prevent="addToWishlist({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-heart"></i></a></li>
                                                @endif


                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <li><a href="" wire:click.prevent="addToCompare({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                                @else
                                                    <li><a href="" wire:click.prevent="addToCompare({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                                @endif


                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="{{ route('product.details', ['slug'=>$c_product->slug])}}">{{$c_product->name}}</a></h6>
                                        <div class="product_price">
                                            @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <span class="price">${{ $c_product->sale_price}}</span>
                                            <del>${{ $c_product->regular_price}}</del>
                                            <div class="on_sale">
                                                <span>{{number_format(round(100 * ($c_product->regular_price - $c_product->sale_price) / $c_product->regular_price))}}% Off</span>
                                            </div>
                                            @else
                                                <span class="price">${{ $c_product->regular_price}}</span>
                                            @endif
                                        </div>
                                        @php
                                        $avgrating = 0;
                                        @endphp

                                        @foreach($c_product->orderItems->where('rstatus',1) as $orderItem)
                                            @php
                                                $avgrating = $avgrating + $orderItem->review->rating;
                                            @endphp
                                        @endforeach

                                        <div class="rating_wrap">
                                            <div class="rating">
                                                @if($c_product->orderItems->where('rstatus',1)->count() > 0)
                                                <div class="product_rate" style="width:{{$avgrating / $c_product->orderItems->where('rstatus',1)->count() * 20}}%"></div>
                                                @else
                                                    <div class="product_rate" style="width:0%"></div>
                                                @endif
                                            </div>
                                            <span class="rating_num">({{$c_product->orderItems->where('rstatus',1)->count()}})</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>



{{-- End Exclusive --}}


<div class="container" wire:ignore>
    <div class="row">

            <div class="col-md-6">
            <div class="single_banner">
                <img src="{{asset('assets/images/banners') }}/{{$homepageBannerFirstLeft->image}}" alt="shop_banner_img1" />
                <div class="single_banner_info">
                    <h5 class="single_bn_title1">{{$homepageBannerFirstLeft->subtitle}}</h5>
                    <h3 class="single_bn_title">{{$homepageBannerFirstLeft->title}}</h3>
                    <a href="{{$homepageBannerFirstLeft->link}}" class="single_bn_link">Shop Now</a>
                </div>
            </div>
        </div>

            <div class="col-md-6">
            <div class="single_banner">
                <img src="{{asset('assets/images/banners') }}/{{$homepageBannerFirstRight->image}}" alt="shop_banner_img2" />
                <div class="single_banner_info">
                    <h3 class="single_bn_title">{{$homepageBannerFirstRight->title}}</h3>
                    <h4 class="single_bn_title1">{{$homepageBannerFirstRight->subtitle}}</h4>
                    <a href="{{$homepageBannerFirstRight->link}}" class="single_bn_link">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- On-sale start --}}

<div >
    @if($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
<div class=" pb_70" >
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h2><img src="{{asset('assets/icons/on-sale.png')}}" alt="" width="40" height="40" style="margin-right: 10px;">On Sale</h2>
                    </div>
                    <div class="deal_timer">
                        <div class="countdown_time countdown_style1" data-time="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}" wire:ignore></div>
                    </div>
                </div>
            </div>
        </div>
        <div >

    <div class="row">
        <div class="col-md-12" >

            @php
               $witems = Cart::instance('wishlist')->content()->pluck('id');
            @endphp

            @php
               $cart = Cart::instance('cart')->content()->pluck('id');
            @endphp

            @php
               $compare = Cart::instance('compare')->content()->pluck('id');
            @endphp 

            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1 resizeclick" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}' wire:ignore>

                
                
                @foreach ($sproducts as $key => $sproduct)

                <div class="item" >
                    <div class="product" >
                        
                        <div class="product_img" >
                                    <a href="">
                                        <img src="{{ asset('assets/images/products') }}/{{$sproduct->image}}" alt="{{$sproduct->name}}">
                                    </a>
                                    <div class="product_action_box" >
                                        <ul class="list_none pr_action_btn" >


                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$sproduct->id}}, '{{$sproduct->name}}', {{$sproduct->sale_price}})">
                                                <i class="icon-basket-loaded"></i> Add To Cart
                                            </a>
                                        </li>
                                        

                                        <li>
                                            <a href="" wire:click.prevent="addToWishlist({{$sproduct->id}}, '{{$sproduct->name}}',{{$sproduct->sale_price}})" ><i class="icon-heart"></i></a>
                                        </li>
                                        

                                        <li>
                                            <a href="" wire:click.prevent="addToCompare({{$sproduct->id}}, '{{$sproduct->name}}',{{$sproduct->sale_price}})" ><i class="icon-shuffle"></i></a>
                                        </li>


                                        </ul>
                                    </div>
                                </div>

                        <div class="product_info">
                            <h6 class="product_title">
                                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}">{{$sproduct->name}}</a>
                            </h6>
                            <div class="product_price">
                            @if($sproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <span class="price">${{ $sproduct->sale_price}}</span>
                            <del>${{ $sproduct->regular_price}}</del>
                            <div class="on_sale">
                                <span>{{number_format(round(100 * ($sproduct->regular_price - $sproduct->sale_price) / $sproduct->regular_price))}}% Off</span>
                            </div>
                            @else
                                <span class="price">${{ $sproduct->regular_price}}</span>
                            @endif
                        </div>

                        @php
                        $avgrating = 0;
                        @endphp

                        @foreach($sproduct->orderItems->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating = $avgrating + $orderItem->review->rating;
                            @endphp
                        @endforeach

                        <div class="rating_wrap">
                            <div class="rating">
                                @if($sproduct->orderItems->where('rstatus',1)->count() > 0)
                                <div class="product_rate" style="width:{{$avgrating / $sproduct->orderItems->where('rstatus',1)->count() * 20}}%"></div>
                                @else
                                    <div class="product_rate" style="width:0%"></div>
                                @endif
                            </div>
                            <span class="rating_num">({{$sproduct->orderItems->where('rstatus',1)->count()}})</span>
                        </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
         </div>
    </div>
</div>
@endif
</div>


{{-- End onsale --}}
   


        <!-- START SECTION SINGLE BANNER -->
<div class="bg_light_blue2 pt-md-0" style="margin-bottom: 50px;">
    <div class="container">
            <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
                <div class="medium_divider d-none d-md-block clearfix"></div>
                <div class="trand_banner_text text-center text-md-left">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">{{$homepageBannerSecond->text}}</span>
                        <h2>{{$homepageBannerSecond->title}}</h2>
                    </div>
                    <h5 class="mb-4">{{$homepageBannerSecond->subtitle}}</h5>
                    <a href="{{$homepageBannerSecond->link}}" class="btn btn-fill-out rounded-0">Shop Now</a>
                </div>
                <div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="{{asset('assets/images/banners')}}/{{$homepageBannerSecond->image}}" alt="tranding_img" />
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- END SECTION SINGLE BANNER -->
        <!-- START SECTION SHOP -->
        <div class="" style="margin-bottom: 70px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s1 text-center">
                            <h2 style="margin-bottom: 40px;">Featured Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row " wire:ignore>
                    <div class="col-md-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @php
                               $witems2 = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp

                            @foreach ($lproducts as $key => $lproduct)

                <div class="item" >
                    <div class="product" >
                        
                        <div class="product_img" >
                                    <a href="">
                                        <img src="{{ asset('assets/images/products') }}/{{$lproduct->image}}" alt="{{$lproduct->name}}">
                                    </a>
                                    <div class="product_action_box" >
                                        <ul class="list_none pr_action_btn" >


                                        @if($lproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$lproduct->id}}, '{{$lproduct->name}}', {{$lproduct->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @else
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$lproduct->id}}, '{{$lproduct->name}}', {{$lproduct->regular_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @endif


                                        @if($lproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToWishlist({{$lproduct->id}}, '{{$lproduct->name}}',{{$lproduct->sale_price}})" ><i class="icon-heart"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToWishlist({{$lproduct->id}}, '{{$lproduct->name}}',{{$lproduct->regular_price}})" ><i class="icon-heart"></i></a></li>
                                        @endif


                                        @if($lproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToCompare({{$lproduct->id}}, '{{$lproduct->name}}',{{$lproduct->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToCompare({{$lproduct->id}}, '{{$lproduct->name}}',{{$lproduct->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @endif


                                        </ul>
                                    </div>
                                </div>

                        <div class="product_info">
                            <h6 class="product_title">
                                <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">{{$lproduct->name}}</a>
                            </h6>
                            <div class="product_price">
                            @if($lproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <span class="price">${{ $lproduct->sale_price}}</span>
                            <del>${{ $lproduct->regular_price}}</del>
                            <div class="on_sale">
                                <span>{{number_format(round(100 * ($lproduct->regular_price - $lproduct->sale_price) / $lproduct->regular_price))}}% Off</span>
                            </div>
                            @else
                                <span class="price">${{ $lproduct->regular_price}}</span>
                            @endif
                        </div>

                        @php
                        $avgrating = 0;
                        @endphp

                        @foreach($lproduct->orderItems->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating = $avgrating + $orderItem->review->rating;
                            @endphp
                        @endforeach

                        <div class="rating_wrap">
                            <div class="rating">
                                @if($lproduct->orderItems->where('rstatus',1)->count() > 0)
                                <div class="product_rate" style="width:{{$avgrating / $lproduct->orderItems->where('rstatus',1)->count() * 20}}%"></div>
                                @else
                                    <div class="product_rate" style="width:0%"></div>
                                @endif
                            </div>
                            <span class="rating_num">({{$lproduct->orderItems->where('rstatus',1)->count()}})</span>
                        </div>

                        </div>
                    </div>
                </div>
                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






