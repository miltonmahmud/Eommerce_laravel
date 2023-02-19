<div class="nain_content" style="margin: 70px 0;">
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                            @if(Cart::instance('cart')->count() > 0)

                                @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Success</strong> {{Session::get('success_message')}}
                                </div>
                                @endif

                                @if(Cart::instance('cart')->count() > 0)
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="{{ asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></a></td>
                                        <td class="product-name" data-title="Product"><a href="{{route('product.details', ['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></td>
                                        @foreach($item->options as $key=>$value)
                                            <div style="vertical-align: middle; width: 180px;">
                                                <p><b>{{$key}} : {{$value}}</b></p>
                                            </div>
                                        @endforeach

                                        @if($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <td class="product-price" data-title="Price">${{$item->model->sale_price}}</td>
                                        @else
                                            <td class="product-price" data-title="Price">${{$item->model->regular_price}}</td>
                                        @endif

                                        <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                        <input type="button" value="-" class="minus" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">
                                        <input type="text" name="quantity" value="{{$item->qty}}" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">
                                      </div></td>
                                        <td class="product-subtotal" data-title="Total">${{$item->subtotal()}}</td>
                                        <td class="product-remove" data-title="Remove"><a href="" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="ti-close"></i></a></td>
                                    </tr>
                                    @endforeach
                                @endif
                                @else
                                <div class="container mt-5">
                                  <div class="row">
                                    <div class="col text-center">
                                      <img src="{{asset('assets/icons/empty-cart.png')}}" alt="" width="80px" style="margin-bottom:20px;" >
                                    </div>
                                  </div>
                                </div>
                                    
                                <h3 style="text-align: center; margin-bottom: 100px;">No Item in Cart</h3>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="coupon field_form input-group">
                @if(!Session::has('coupon'))
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span style="margin-left: 10px;"><img src="{{asset('assets/icons/coupon.png')}}" alt="" width="40" height="40" style="margin-right: 10px;">I have Coupon code</span>
                </label>
            </div>
                <div class="col-md-6">
                     @if($haveCouponCode == 1)
                <form wire:submit.prevent="applyCouponCode">
                    @if(Session::has('coupon_message'))
                        <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                    @endif
                    <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code.." name="coupon-code" wire:model="couponCode">
                    <div class="input-group-append">
                        <button class="btn btn-fill-out btn-sm" type="submit" style="margin-top: 10px;">Apply Coupon</button>
                    </div>
                </form>
                @endif
                @endif
                </div>

            </div>
            <div class="col-md-6">
                <div>
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Subtotal</td>
                                    <td class="cart_total_amount">${{Cart::instance('cart')->subtotal()}}</td>
                                </tr>
                                @if(Session::has('coupon'))
                                <tr>
                                    <td class="cart_discount_label"><img src="{{asset('assets/icons/discounts.png')}}" alt="" width="20" height="20" style="margin-right: 10px;" >Discount({{Session::get('coupon')['code']}}) <a href="" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></td>
                                    <td class="cart_discount_amount"></span>-${{number_format($discount,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_tax_label">Subtotal with Discount</td>
                                    <td class="cart_tax_amount">${{number_format($subtotalAfterDiscount,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_tax_label">Tax ({{config('cart.tax')}}%)</td>
                                    <td class="cart_tax_amount">${{number_format($taxAfterDiscount,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_tax_label">Total</td>
                                    <td class="cart_tax_amount"><b class="index">${{number_format($totalAfterDiscount,2)}}</b></td>
                                </tr>
                                @else
                                <tr>
                                    <td class="cart_tax_label">Tax</td>
                                    <td class="cart_tax_amount">{{Cart::instance('cart')->tax()}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>${{Cart::instance('cart')->total()}}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-fill-out" wire:click.prevent="checkout">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

</div>