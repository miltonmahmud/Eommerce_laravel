
<div class="main_content">
    <style>
    .pr_action_btn li a {
            background-color: #fff;
            font-size: 16px;
            width: 160px;
            height: 40px;
            color: #333;
            line-height: 40px;
        }

        .product_action_box {
            top: 80%;
        }

        .product-wish{
            position: absolute;
            top:5%;
            left:0;
            z-index:99;
            right:20px;
            text-align:right;
            padding-top: 0;
        }
        .fa{
            color:#cbcbcb;
            font-size:22px;
        }

        .fa:hover{
            color:#ff7007;
        }

        .fill-heart{
           color:#FF324D !important;
       }

       .product:hover .fa {
        color: #fff;
       }

       .shop_container.list .list_product_action_box .pr_action_btn li.add-to-cart a {  
            padding: 3px 22px;
        }
       </style>
    <div class="section">
        <div class="container">
            <div class="row shop_container">
            <div class="col-lg-12">
                @if(Cart::instance('wishlist')->content()->count() > 0 )

                <div class="table-responsive wishlist_table">
                    @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{Session::get('message')}}
                      </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::instance('wishlist')->content() as $item)
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img src="{{ asset('assets/images/products/') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></a></td>
                                <td class="product-name" data-title="Product"><a href="{{ route('product.details', ['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></td>
                                @if($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                    <td class="product-price" data-title="Price">${{ $item->model->sale_price}}</td>
                                @else
                                    <td class="product-price" data-title="Price">${{ $item->model->regular_price}}</td>
                                @endif
                                <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">{{$item->model->stock_status}}</span></td>
                                <td class="product-add-to-cart"><a href=""  wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a></td>
                                <td class="product-remove" data-title="Remove"><a href="" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="ti-close"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="mt-5">
                  <div class="row">
                    <div class="col text-center">
                      <img src="{{asset('assets/icons/empty-wishlist.png')}}" alt="" width="80px" style="margin-top: 30px;" >
                    </div>
                  </div>
                </div>
                <h4 class="text-center" style="margin: 30px 0 150px 0;">No item in wishlist</h4>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
