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

            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1 resizeclick" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}' wire:ignore.self>

                
                
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



@push('scripts')
    
    <script>
    $(".Item_added").click(function(){   

var $owlCarousel = $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
                $owlCarousel.trigger('refresh.owl.carousel');
            });


  
});

          
           
    </script>

@endpush






