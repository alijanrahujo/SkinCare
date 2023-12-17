<ul>
    @foreach ($categories as $category)
        <li><a href="#">{{ $category->title }}</a></li>
    @endforeach
</ul>
