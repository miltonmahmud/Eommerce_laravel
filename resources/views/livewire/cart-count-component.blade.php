
<li class="dropdown cart_dropdown">

	<style>

		.navbar-nav.attr-nav li .nav-link {
		    padding: 12px 0px;
		    position: relative;
		    white-space: nowrap;
		}

		.cart_count, .wishlist_count {
		    position: relative;
		    top: -5px;
		    left: -4px;
		    font-size: 11px;
		    /* background-color: #FF324D; */
		    background-color: #0AB395;
		    border-radius: 50px;
		    height: 18px;
		    line-height: 18px;
		    color: #fff;
		    min-width: 18px;
		    text-align: center;
		    padding: 0 5px;
		    display: inline-block;
		    vertical-align: top;
		    /*margin-left: -5px;*/
		    margin-right: -12px;
		}

		.wish {
			font-size: 12px;
			text-transform: uppercase;
			line-height: 10px;
		    font-weight: 600;
		    margin-right: 20px;
		}

		.ti-shopping-cart {
			margin-left: 5px;
		}

		

	</style>

    <a class="nav-link cart_trigger" href="" data-toggle="dropdown" >
        <i class="linearicons-cart"></i>
        @if(Cart::instance('cart')->count() > 0)
            <span class="wishlist_count">{{Cart::instance('cart')->count()}}</span>
        @endif
        <p class="wish">Cart</p>
    </a>
    <div class="cart_box dropdown-menu dropdown-menu-right">
        <ul class="cart_list">
        	@foreach(Cart::instance('cart')->content() as $item)
            <li>
                <a href="#" class="item_remove" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="ion-close"></i></a>
                <a href="#"><img src="{{ asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}">{{$item->model->name}}</a>
                @if($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                <span class="cart_quantity">1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{$item->model->sale_price}}</span>
                @else
                <span class="cart_quantity">1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{$item->model->regular_price}}</span>
                @endif
            </li>
            @endforeach
        </ul>
        <div class="cart_footer">
            <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>{{Cart::instance('cart')->subtotal()}}</p>
            <p class="cart_buttons"><a href="{{route('product.cart')}}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="#" wire:click.prevent="checkout" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
        </div>
    </div>
</li>