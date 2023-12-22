{{-- <div class="humberger__menu__cart">
    <ul>
        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
        <li><a href="{{ Route('cart.index') }}"><i class="fa fa-shopping-bag"></i> <span>8</span></a></li>
    </ul>
    <div class="header__cart__price">item: <span>$10.00</span></div>
</div> --}}

<div class="header__cart">
    <ul>
        {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
        <li><a href="{{ Route('cart.index') }}"><i class="fa fa-shopping-bag"></i>
                <span>{{ $cart['cart']??0 }}</span></a>
        </li>
    </ul>
    <div class="header__cart__price">item: <span>RS {{ $cart['price']??0 }}</span></div>
</div>
