<div class="main_content">
    <div class="section">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">

	                @if(Cart::instance('compare')->content()->count() > 0 )
	                	<div class="compare_box">
	                    <div class="table-responsive">
	                        <table class="table table-bordered text-center">
	                        <tbody>
	                            <tr class="pr_image">
	                                <td class="row_title">Product Image</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="row_img"><img src="{{ asset('assets/images/products/') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></td>
	                                @endforeach
	                            </tr>
	                            <tr class="pr_title">
	                                <td class="row_title">Product Name</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="product_name"><a href="shop-product-detail.html">{{$item->model->name}}</a></td>
	                                @endforeach
	                            </tr>
	                            <tr class="pr_price">
	                                <td class="row_title">Price</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                @if($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
	                                <td class="product_price"><span class="price">${{ $item->model->sale_price}}</span></td>
	                                @else
	                                	<td class="product_price"><span class="price">${{ $item->model->regular_price}}</span></td>
	                                @endif
	                                @endforeach

	                            </tr>
	                            <tr class="pr_rating">
	                                <td class="row_title">Rating</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td>
	                                	@php
	                                    $avgrating = 0;
	                                    @endphp

	                                    @foreach($item->model->orderItems->where('rstatus',1) as $orderItem)
	                                        @php
	                                            $avgrating = $avgrating + $orderItem->review->rating;
	                                        @endphp
	                                    @endforeach

	                                    <div class="rating_wrap">
                                    <div class="rating">
                                        @if($item->model->orderItems->where('rstatus',1)->count() > 0)
		                                     <div class="product_rate" style="width:{{$avgrating / $item->model->orderItems->where('rstatus',1)->count() * 20}}%"></div>
		                                        @else
		                                            <div class="product_rate" style="width:0%"></div>
		                                        @endif
		                                    </div>
		                                    <span class="rating_num">({{$item->model->orderItems->where('rstatus',1)->count()}})</span>
		                                    </div>
		                                </div>
	                                </td>
	                                @endforeach
	                            </tr>
	                            <tr class="pr_add_to_cart">
	                                <td class="row_title">Add To Cart</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="row_btn"><a href="#" class="btn btn-fill-out" wire:click.prevent="moveProductFromCompareToCart('{{$item->rowId}}')"><i class="icon-basket-loaded"></i> Add To Cart</a></td>
	                                @endforeach
	                            </tr>
	                            <tr class="description">
	                                <td class="row_title">Description</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="row_text"><p>{{$item->model->description}}</p></td>
	                                @endforeach
	                            </tr>











				            	@foreach($item->model->attributeValues->unique('product_attribute_id') as $av)
				                <tr class="pr_color">
			                        <td class="row_title">
			                        	@if($av)
			                    		{{$av->productAttribute->name}}
			                    		@else
			                    		{{$av->productAttribute->name = null}}
			                    		@endif
			                        </td>
			                        @foreach(Cart::instance('compare')->content() as $item)
			                            @if($av ==! null)
			                            	<td class="row_color">
			                            	@foreach($av->productAttribute->attributeValues->where('product_id',$item->model->id) as $pav)

			                                {{$pav->value}}

			                                @if(!$loop->last)
										        ,
										    @endif	

			                                @endforeach
			                             </td>
			                            @else
			                            	<td></td>
			                            @endif
			                        @endforeach
			                	</tr>
			                	@endforeach












	                            <tr class="pr_stock">
	                                <td class="row_title">Item Availability</td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="row_stock"><span class="in-stock">{{$item->model->stock_status}}</span></td>
	                                @endforeach
	                            </tr>
	                            <tr class="pr_remove">
	                                <td class="row_title"></td>
	                                @foreach(Cart::instance('compare')->content() as $item)
	                                <td class="row_remove">
	                                    <a href="#" wire:click.prevent="removeFromCompare({{$item->model->id}})"><span>Remove</span> <i class="fa fa-times"></i></a>
	                                </td>
	                                @endforeach
	                            </tr>
	                        </tbody>
	                    </table>
	                    </div>
	                </div>
	                @endif

	            </div>
	        </div>
	    </div>
	</div>
</div>
