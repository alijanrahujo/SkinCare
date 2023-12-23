@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <li><a href="{{ Route('shop') }}">All</a></li>
                                @foreach ($categories as $category)
                                    <li><a href="{{ Route('shop', $category->id) }}">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $data['price']['min'] }}" data-max="{{ $data['price']['max'] }}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> --}}
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($letestProducts->take(3) as $val)
                                            <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $val->title }}</h6>
                                                    <span>RS {{ $val->price }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($letestProducts->take(3, 3) as $val)
                                            <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $val->title }}</h6>
                                                    <span>RS {{ $val->price }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($saleProducts as $sale)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ asset('storage/uploads/products/' . $sale->thumbnail) }}">
                                                <div class="product__discount__percent">
                                                    - {{ number_format(100 - ($sale->price * 100) / $sale->mrp, 0) }}%
                                                </div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{ Route('addcart', $sale->id) }}"><i
                                                                class="fa fa-heart"></i></a></li>
                                                    <li><a href="{{ Route('addcart', $sale->id) }}"><i
                                                                class="fa fa-retweet"></i></a></li>
                                                    <li><a href="{{ Route('addcart', $sale->id) }}"><i
                                                                class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>Dried Fruit</span>
                                                <h5><a href="#">{{ $sale->title }}</a></h5>
                                                <div class="product__item__price">RS {{ $sale->price }}
                                                    <span>RS {{ $sale->mrp }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                {{-- <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $data['product']['total'] }}</span> Products found</h6>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ asset('storage/uploads/products/' . $product->thumbnail) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ Route('addcart', $product->id) }}"><i
                                                        class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ Route('addcart', $product->id) }}"><i
                                                        class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ Route('addcart', $product->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->title }}</a></h6>
                                        <h5>RS {{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        {{-- {{ $products->links() }} --}}
                        {{-- <a href="">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
