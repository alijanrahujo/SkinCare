<ul>
    <li><a href="/" class="active">Home</a></li>
    <li><a href="{{ Route('shop') }}">Shop</a></li>
    <li><a href="#">Category</a>
        <ul class="header__menu__dropdown">
            @foreach ($categories as $category)
                <li><a href="{{ Route('shop', $category->id) }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </li>
    <li><a href="{{ Route('contactus') }}">Contact</a></li>
</ul>
