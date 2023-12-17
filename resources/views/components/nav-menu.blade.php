<ul>
    <li><a href="/" class="active">Home</a></li>
    <li><a href="#">Shop</a></li>
    <li><a href="#">Category</a>
        <ul class="header__menu__dropdown">
            @foreach ($categories as $category)
                <li><a href="#">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </li>
    <li><a href="#">Contact</a></li>
</ul>
