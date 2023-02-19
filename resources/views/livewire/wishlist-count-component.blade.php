
<li>

	<style>

		.cart_count, .wishlist_count {
		    position: relative;
		    top: -4px;
		    left: -5px;
		    font-size: 11px;
		    /* background-color: #FF324D; */
		    background-color: #0AB395;
		    border-radius: 50px;
		    height: 16px;
		    line-height: 16px;
		    color: #fff;
		    min-width: 16px;
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
			line-height: 36px;
		    font-weight: 600;
		    line-height: 10px;
		}

		.linearicons-heart {
			margin-left: 15px;
		}

		

	</style>

    <a href="{{route('product.wishlist')}}" class="nav-link">
        <i class="linearicons-heart"></i>
        @if(Cart::instance('wishlist')->count() > 0)
        	<span class="wishlist_count">{{Cart::instance('wishlist')->count()}}</span>
        @endif
        <p class="wish">Wishlist</p>
    </a>
</li>

