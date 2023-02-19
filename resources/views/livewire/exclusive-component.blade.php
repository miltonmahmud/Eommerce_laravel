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
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">


                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <li class="add-to-cart">
                                                    <a href="" wire:click.prevent="store({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                @else
                                                <li class="add-to-cart">
                                                    <a href="" wire:click.prevent="store({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->regular_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                @endif




                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <li><a href="" wire:click.prevent="addToCompare({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-shuffle"></i></a></li>
                                                @else
                                                    <li><a href="" wire:click.prevent="addToCompare({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-shuffle"></i></a></li>
                                                @endif


                                                <li>
                                                    <a href="#" class="" data-toggle="modal" data-target="#exclusive{{$c_product->id}}" aria-hidden="true">
                                                    
                                                    <i class="icon-magnifier-add"></i></a>
                                                </li>



                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <li><a href="" wire:click.prevent="addToWishlist({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-heart"></i></a></li>
                                                @else
                                                    <li><a href="" wire:click.prevent="addToWishlist({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-heart"></i></a></li>
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
                            <div id="exclusive{{$c_product->id}}" class="modal fade" role="dialog" wire:ignore>
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable " >
                                <!-- Modal content-->
                                <div class="modal-content" >
                                    <div class="ajax_quick_view">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="product-image">
                                                    <div class="product_img_box">
                                                        <img src="{{ asset('assets/images/products') }}/{{$c_product->image}}"  alt="{{$c_product->name}}" />
                                                    </div>
                                                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                                        <div class="item">
                                                            <a href="#" class="product_gallery_item active" data-image="assets/images/product_img1.jpg" data-zoom-image="assets/images/product_zoom_img1.jpg">
                                                                <img src="assets/images/product_small_img1.jpg" alt="product_small_img1" />
                                                            </a>
                                                        </div>
                                                        <div class="item">
                                                            <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-2.jpg" data-zoom-image="assets/images/product_zoom_img2.jpg">
                                                                <img src="assets/images/product_small_img2.jpg" alt="product_small_img2" />
                                                            </a>
                                                        </div>
                                                        <div class="item">
                                                            <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-3.jpg" data-zoom-image="assets/images/product_zoom_img3.jpg">
                                                                <img src="assets/images/product_small_img3.jpg" alt="product_small_img3" />
                                                            </a>
                                                        </div>
                                                        <div class="item">
                                                            <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-4.jpg" data-zoom-image="assets/images/product_zoom_img4.jpg">
                                                                <img src="assets/images/product_small_img4.jpg" alt="product_small_img4" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="pr_detail">
                                                    <div class="product_description">
                                                        <h4 class="product_title" id=""><a href="#">{{$c_product->name}}</a></h4>
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
                                                        <div class="pr_desc">
                                                            <p>{{$c_product->description}}</p>
                                                        </div>
                                                        <div class="product_sort_info">
                                                            <ul>
                                                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                                            </ul>
                                                        </div>

                                                        <hr>
                                                        <div class="row">
                                                        @foreach($c_product->attributeValues->unique('product_attribute_id') as $av)
                                                               <div class="col-lg-3">
                                                                   <ul class="p-att" style="list-style: none;">
                                                                       <li style="display: inline-block;float: left;">
                                                                           <span class="att-title text-center">{{$av->productAttribute->name}}</span>
                                                                           <select class="form-control attribute-box" style="width: 100px; wire:model="satt.{{$av->productAttribute->name}}">
                                                                               @foreach($av->productAttribute->attributeValues->where('product_id',$c_product->id) as $pav)
                                                                                  <option value="{{$pav->value}}">{{$pav->value}}</option>
                                                                               @endforeach
                                                                           </select>
                                                                       </li>
                                                                   </ul>
                                                               </div>
                                                        @endforeach
                                                        </div>

                                                    </div>
                                                    <hr />
                                                    <div class="cart_extra">
                                                        <div class="cart-product-quantity">
                                                            <div class="quantity">
                                                                <input type="button" value="-" class="minus" wire:click.prevent="decreseQuantity">
                                                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                                <input type="button" value="+" class="plus" wire:click.prevent="increaseQuantity">
                                                            </div>
                                                        </div>
                                                        <div class="cart_btn">
                                                            @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                            <button class="btn btn-fill-out btn-addtocart" type="button" wire:click.prevent="modalstore({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->sale_price}})"><i class="icon-basket-loaded"></i> Add to cart</button>
                                                            @else
                                                                <button class="btn btn-fill-out btn-addtocart" type="button" wire:click.prevent="modalstore({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->regular_price}})"><i class="icon-basket-loaded"></i> Add to cart</button>
                                                            @endif

                                                            @if($compare->contains($c_product->id))
                                                              
                                                                
                                                                <a href="" class="diseabled" style="margin: 10px;">Compared!</a>
                                                              
                                                            @else

                                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                                    <a  class="add_compare" href="" wire:click.prevent="addToCompare2({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-shuffle"></i></a>
                                                                @else
                                                                    <a class="add_compare" href="" wire:click.prevent="addToCompare2({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-shuffle"></i></a>
                                                                @endif

                                                            @endif

                                                            @if($witems->contains($c_product->id))
                                                              
                                                                <a href="" class="disabled" style="margin-left: 10px;"> Wishlisted!</a>
                                                            @else

                                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                                    <a class="add_wishlist" href="" wire:click.prevent="addToWishlist2({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->sale_price}})" ><i class="icon-heart"></i></a>
                                                                @else
                                                                    <a class="add_wishlist" href="" wire:click.prevent="addToWishlist2({{$c_product->id}}, '{{$c_product->name}}',{{$c_product->regular_price}})" ><i class="icon-heart"></i></a>
                                                                @endif

                                                            @endif


                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <ul class="product-meta">
                                                        <li>SKU: <a href="#">{{$c_product->SKU}}</a></li>
                                                        <li>Category: <a href="#">{{$c_product->category->name}}</a></li>
                                                        <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
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

