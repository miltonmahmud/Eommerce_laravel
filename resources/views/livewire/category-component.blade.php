<div class="main_content" style="margin: 70px 0;">

    <style>
        
        .noUi-base {
            height: 4px !important;
            background-color: #ddd;
        }

        .noUi-horizontal {
            height: 4px;
        }

        .noUi-horizontal .noUi-handle {
            border-radius: 100%;
            width: 18px;
            height: 18px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);
        }

        .noUi-pips.noUi-pips-horizontal {
            display: none;
        }

        .noUi-connect {
            background: #FF324D;
        }

    </style>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" wire:model="sorting">
                                        <option value="default">Default sorting</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                                <div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" wire:model="pagesize">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                    </div>
                </div> 
                <div class="row shop_container">

                    @php
                       $witems = Cart::instance('wishlist')->content()->pluck('id');
                    @endphp

                    @foreach($products as $product)
                        <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <a href="">
                                    <img src="{{asset('assets/images/products')}}/{{ $product->image}}" alt="{{ $product->name}}">
                                </a>
                                <div class="product_action_box" >
                                    <ul class="list_none pr_action_btn">

                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})"><i class="icon-basket-loaded"></i> </a></li>
                                        @else
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="icon-basket-loaded"></i> </a></li>
                                        @endif


                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}',{{$product->sale_price}})" ><i class="icon-heart"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}',{{$product->regular_price}})" ><i class="icon-heart"></i></a></li>
                                        @endif


                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}',{{$product->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}',{{$product->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{ route('product.details', ['slug'=>$product->slug])}}">{{ $product->name}}</a></h6>
                                <div class="product_price">
                                    @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                    <span class="price">${{ $product->sale_price}}</span>
                                    <del>${{ $product->regular_price}}</del>
                                    <div class="on_sale">
                                        <span>{{number_format(round(100 * ($product->regular_price - $product->sale_price) / $product->regular_price))}}% Off</span>
                                    </div>
                                    @else
                                        <span class="price">${{ $product->regular_price}}</span>
                                    @endif
                                </div>

                                @php
                                $avgrating = 0;
                                @endphp

                                @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                    @php
                                        $avgrating = $avgrating + $orderItem->review->rating;
                                    @endphp
                                @endforeach

                            <div class="rating_wrap">
                                <div class="rating">
                                    @if($product->orderItems->where('rstatus',1)->count() > 0)
                                    <div class="product_rate" style="width:{{$avgrating / $product->orderItems->where('rstatus',1)->count() * 20}}%"></div>
                                    @else
                                        <div class="product_rate" style="width:0%"></div>
                                    @endif
                                </div>
                                <span class="rating_num">({{$product->orderItems->where('rstatus',1)->count()}})</span>
                            </div>
                                <div class="pr_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <li class="add-to-cart"><a href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @else
                                            <li class="add-to-cart"><a href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @endif

                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}',{{$product->sale_price}})" ><i class="icon-heart"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}',{{$product->regular_price}})" ><i class="icon-heart"></i></a></li>
                                        @endif

                                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}',{{$product->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}',{{$product->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="widget_categories">
                            @foreach($categories as $category)
                                @if(count($category->subCategories) > 0)
                                   <li>
                                        <a href="{{route('product.category',['category_slug'=>$category->slug])}}">
                                            <span class="categories_name">{{$category->name}}</span>
                                        </a>
                                        <a href=".{{$category->slug}}" data-toggle="collapse" aria-expanded="false" class=" categories_num "><span class="categories_num">({{count($category->subCategories)}})</span>
                                        </a>
                                        <ul style="margin-top: 10px;" class="{{$category->slug}} collapse list-unstyled">
                                            @foreach($category->subCategories as $scategory)
                                                <li style="margin-left: 20px;">
                                                <a href="{{route('product.category', ['category_slug'=>$category->slug, 'scategory_slug'=>$scategory->slug])}}">{{$scategory->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li> 
                                @else
                                <li>
                                    <a href="{{route('product.category',['category_slug'=>$category->slug])}}">
                                        <span class="categories_name">{{$category->name}}</span>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                             <div>
                        <h5>Price : <span style="color: #FF324D;font-weight: 600;">${{number_format($min_price)}} - ${{number_format($max_price)}}</span></h5>
                        <div class="" style="padding: 10px 5px 40px 5px;">
                            <div id="slider2" wire:ignore>
                                
                            </div>
                        </div>
                    </div>
                         </div>
                    </div>
                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="{{asset('assets/images/banners')}}/{{$ShoppageBanner->image}}" alt="sidebar_banner_img">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">{{$ShoppageBanner->subtitle}}</h5>
                                <h3 class="text-uppercase shop_title">{{$ShoppageBanner->title}}</h3>
                                <a href="{{$ShoppageBanner->link}}" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@push('scripts')
    <script>
        var slider = document.getElementById('slider2');
        noUiSlider.create(slider,{
            start : [100,400],
            connect:true,
            range :{
                'min' : 1,
                'max' : 500
            },
            pips:{
                mode:'steps',
                stepped:true,
                density:4
            }
        });

        slider.noUiSlider.on('update', function(value){
           @this.set('min_price',value[0]);
           @this.set('max_price',value[1]);
        });
    </script>
@endpush