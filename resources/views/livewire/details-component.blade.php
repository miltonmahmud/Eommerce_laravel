<div class="main_content">

    <style>
        
        .attribute-box {
            height: 38px !important;
            padding: 8px 12px !important;
            margin-bottom: 10px !important;
            text-transform: capitalize;
        }

        .att-title {
            text-transform: uppercase;
            font-weight: 600 !important;
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            color: #333;
        }

    </style>

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image">
                    <div class="product_img_box">
                        <img id="product_img" src='{{asset('assets/images/products')}}/{{$product->image}}' data-zoom-image="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                        @php
                            $images = explode(",",$product->images);
                        @endphp
                        @foreach($images as $image)
                        @if($image)
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{asset('assets/images/products') }}/{{$image}}" data-zoom-image="{{asset('assets/images/products') }}/{{$image}}">
                                <img src="{{asset('assets/images/products') }}/{{$image}}" alt="{{$product->name}}" />
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title" style="text-transform: capitalize;"><a href="{{ route('product.details', ['slug'=>$product->slug])}}">{{ $product->name}}</a></h4>
                        <div class="product_price">
                            @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <span class="price">${{ $product->sale_price}}</span>
                            <del>{{ $product->regular_price}}</del>
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
                            <p>{!! $product->short_description !!}</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> 1 Year Warranty</li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                          <hr>
                        <div class="">
                            <div class="row" >

                                @foreach($product->attributeValues->unique('product_attribute_id') as $av)
                                       <div class="col-lg-3">
                                           <ul class="p-att" style="list-style: none;">
                                               <li style="display: inline-block;float: left;">
                                                   <span class="att-title text-center">{{$av->productAttribute->name}}</span>
                                                   <select class="form-control attribute-box" style="width: 100px; wire:model="satt.{{$av->productAttribute->name}}">
                                                       @foreach($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                                          <option value="{{$pav->value}}">{{$pav->value}}</option>
                                                       @endforeach
                                                   </select>
                                               </li>
                                           </ul>
                                       </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus" wire:click.prevent="decreseQuantity">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4" wire:model="qty">
                                <input type="button" value="+" class="plus" wire:click.prevent="increaseQuantity">
                            </div>
                        </div>
                        <div class="cart_btn">
                                @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                    <a href="#" class="btn btn-fill-out btn-addtocart" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', '{{$product->sale_price}}')">Add to Cart</a>
                                @else
                                    <a href="#" class="btn btn-fill-out btn-addtocart" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', '{{$product->regular_price}}')">Add to Cart</a>
                                @endif
                            <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: {{$product->SKU}}</li>
                        <li>Category: <a href="#">{{$product->category->name}}</a></li>
                        <li>Stock Status: <a href="#">{{ $product->stock_status}}</a></li>
                    </ul>
                    
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews ({{$product->orderItems->where('rstatus',1)->count ()}})</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab">
                        <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                            <p>{{ $product->description}}</p>
                        </div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                            <table class="table table-bordered">
                            @foreach($product->attributeValues->unique('product_attribute_id') as $av)
                                <tr style="text-align: center;">
                                    <td style="background-color: #FF324D; color: #fff;">{{$av->productAttribute->name}}</td>
                                @foreach($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                    <td>{{$pav->value}}</td>
                                @endforeach
                                </tr>
                            @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            <div class="comments">
                                <h5 class="product_tab_title"> Review For <span></span></h5>
                                <ul class="list_none comment_list mt-4">

                                    @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                    <li>
                                        <div class="comment_img">
                                            <img src="{{asset('assets/images/profile')}}/{{$orderItem->order->user->profile->image}}" alt="{{$orderItem->order->user->name}}"/>
                                        </div>
                                        <div class="comment_block">
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{ $orderItem->review->rating * 20}}%"></div>
                                                </div>
                                            </div>
                                            <p class="customer_meta">
                                                <span class="review_author">{{$orderItem->order->user->name}}</span>
                                                <span class="comment-date">
                                                    <time datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                </span>
                                            </p>
                                            <div class="description">
                                                <p>
                                                    {{$orderItem->review->comment}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="small_divider"></div>
                <div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row " wire:ignore>
                    <div class="col-md-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @php
                               $witems2 = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp

                            @foreach ($related_products as $key => $r_product)

                <div class="item" >
                    <div class="product" >
                        
                        <div class="product_img" >
                                    <a href="">
                                        <img src="{{ asset('assets/images/products') }}/{{$r_product->image}}" alt="{{$r_product->name}}">
                                    </a>
                                    <div class="product_action_box" >
                                        <ul class="list_none pr_action_btn" >


                                        @if($r_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$r_product->id}}, '{{$r_product->name}}', {{$r_product->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @else
                                        <li class="add-to-cart">
                                            <a href="" wire:click.prevent="store({{$r_product->id}}, '{{$r_product->name}}', {{$r_product->regular_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        @endif


                                        @if($r_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToWishlist({{$r_product->id}}, '{{$r_product->name}}',{{$r_product->sale_price}})" ><i class="icon-heart"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToWishlist({{$r_product->id}}, '{{$r_product->name}}',{{$r_product->regular_price}})" ><i class="icon-heart"></i></a></li>
                                        @endif


                                        @if($r_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <li><a href="" wire:click.prevent="addToCompare({{$r_product->id}}, '{{$r_product->name}}',{{$r_product->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @else
                                            <li><a href="" wire:click.prevent="addToCompare({{$r_product->id}}, '{{$r_product->name}}',{{$r_product->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                        @endif


                                        </ul>
                                    </div>
                                </div>

                        <div class="product_info">
                            <h6 class="product_title">
                                <a href="{{route('product.details',['slug'=>$r_product->slug])}}">{{$r_product->name}}</a>
                            </h6>
                            <div class="product_price">
                            @if($r_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <span class="price">${{ $r_product->sale_price}}</span>
                            <del>${{ $r_product->regular_price}}</del>
                            <div class="on_sale">
                                <span>{{number_format(round(100 * ($r_product->regular_price - $r_product->sale_price) / $r_product->regular_price))}}% Off</span>
                            </div>
                            @else
                                <span class="price">${{ $r_product->regular_price}}</span>
                            @endif
                        </div>

                        @php
                        $avgrating = 0;
                        @endphp

                        @foreach($r_product->orderItems->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating = $avgrating + $orderItem->review->rating;
                            @endphp
                        @endforeach

                        <div class="rating_wrap">
                            <div class="rating">
                                @if($r_product->orderItems->where('rstatus',1)->count() > 0)
                                <div class="product_rate" style="width:{{$avgrating / $r_product->orderItems->where('rstatus',1)->count() * 20}}%"></div>
                                @else
                                    <div class="product_rate" style="width:0%"></div>
                                @endif
                            </div>
                            <span class="rating_num">({{$r_product->orderItems->where('rstatus',1)->count()}})</span>
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
<!-- END SECTION SHOP -->

</div>
