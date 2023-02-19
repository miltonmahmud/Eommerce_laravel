<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4><img src="{{asset('assets/icons/invoice.png')}}" alt="" width="30" height="30" style="margin-right: 10px;" >Billing Details</h4>
                </div>
                <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                <form action="">
                    <div class="form-group">
                        <input type="text" required class="form-control" name="fname" placeholder="First name *" wire:model="firstname">
                        @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="lname" placeholder="Last name *" wire:model="lastname">
                        @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="email" placeholder="Email address *" wire:model="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_address" required="" placeholder="Address *" wire:model="line1">
                        @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_address2" required="" placeholder="Address line2">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="city" placeholder="City*" wire:model="city">
                        @error('city') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="province" placeholder="Province*" wire:model="province">
                        @error('province') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="state" placeholder="County *" wire:model="country">
                        @error('country') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *" wire:model="zipcode">
                        @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="phone" placeholder="Phone *" wire:model="mobile">
                        @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="ship_detail">
                        <div class="form-group">
                        <div class="chek-form">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="different-add" id="different-add" value="1" wire:model="ship_to_different">
                                <label class="form-check-label label_info" for="different-add"><span>Ship to a different address?</span></label>
                            </div>
                        </div>
                    </div>
                    @if($ship_to_different)
                        <div class="different_address">
                    <div class="form-group">
                        <input type="text" required class="form-control" name="fname" placeholder="First name *" wire:model="s_firstname">
                        @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="lname" placeholder="Last name *" wire:model="s_lastname">
                        @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="email" placeholder="Email address *" wire:model="s_email">
                        @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_address" required="" placeholder="Address *" wire:model="s_line1">
                        @error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_address2" required="" placeholder="Address line2" wire:model="s_line2">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="city" placeholder="City*" wire:model="s_city">
                        @error('s_city') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="province" placeholder="Province*" wire:model="s_province">
                        @error('s_province') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="state" placeholder="County *" wire:model="s_country">
                        @error('s_country') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *" wire:model="s_zipcode">
                        @error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="phone" placeholder="Phone *" wire:model="s_mobile">
                        @error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4><img src="{{asset('assets/icons/total-orders.png')}}" alt="" width="30" height="30" style="margin-right: 10px;" >Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td>{{$item->model->name}} <span class="product-qty">x {{$item->qty}}</span></td>
                                    <td>${{$item->subtotal()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">${{Cart::instance('cart')->subtotal()}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    @if(!Session::has('coupon'))
                                    <td class="product-subtotal">${{Session::get('checkout')['total']}}</td>
                                    @else
                                    <td class="product-subtotal">${{Session::get('checkout')['total']}} <span style="color: green;">(Coupon Applied)</span></td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4><img src="{{asset('assets/icons/wallet.png')}}" alt="" width="30" height="30" style="margin-right: 10px;" >Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment-method" id="exampleRadios3" value="cod" wire:model="paymentmode">
                                <label class="form-check-label" for="exampleRadios3">Cash On Delivery</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment-method" id="exampleRadios4" value="card" wire:model="paymentmode">
                                <label class="form-check-label" for="exampleRadios4">Debit / Credit Card</label>
                                <p data-method="option4" class="payment-text">
                                    @if($paymentmode == 'card')
                                      <div class="wrap-address-billing">
                                         @if(Session::has('stripe_error'))
                                             <div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
                                         @endif
                                         <p class="row-in-form">
                                            <label for="card-no">Card Number:</label><br>
                                            <input type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no" class="form-control" style="width: 370px;" >
                                            @error('card_no') <span class="text-danger">{{$message}}</span> @enderror
                                         </p>

                                         <p class="row-in-form">
                                            <label for="exp-month">Expiry Month:</label><br>
                                            <input type="text" name="exp-month" value="" placeholder="MM" wire:model="exp_month" class="form-control" style="width: 370px;">
                                            @error('exp_month') <span class="text-danger">{{$message}}</span> @enderror
                                         </p>

                                         <p class="row-in-form">
                                            <label for="exp-year">Expiry Year:</label><br>
                                            <input type="text" name="exp-year" value="" placeholder="YYYY" wire:model="exp_year" class="form-control" style="width: 370px;">
                                            @error('exp_year') <span class="text-danger">{{$message}}</span> @enderror
                                         </p>

                                         <p class="row-in-form">
                                            <label for="cvc">CVC:</label><br>
                                            <input type="password" name="cvc" value="" placeholder="CVC" wire:model="cvc" class="form-control" style="width: 370px;">
                                            @error('cvc') <span class="text-danger">{{$message}}</span> @enderror
                                         </p>
                                      </div>
                                      @endif
                                </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment-method" id="exampleRadios5" value="paypal" wire:model="paymentmode">
                                <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('checkout'))
                      <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
                    @endif
                    @if($errors->isEmpty())
                       <div wire:ignore id="processing" style="font-size:22px; margin-bottom: 20px; padding-left:37px; color:green; display:none;":>
                          <i class="fa fa-spinner fa-pulse fa-fw"></i>
                          <span>Processing...</span>
                       </div>
                    @endif
                    <button class="btn btn-fill-out btn-block" type="submit">Place Order</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

</div>