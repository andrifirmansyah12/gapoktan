@include('components.pages.header')

<style>
    .body-spinner {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999999999;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: hidden;
    }

    .content-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .pl {
        width: 6em;
        height: 6em;
    }

    .pl__ring {
        animation: ringA 2s linear infinite;
    }

    .pl__ring--a {
        stroke: #16A085;
    }

    .pl__ring--b {
        animation-name: ringB;
        stroke: #ffff;
    }

    .pl__ring--c {
        animation-name: ringC;
        stroke: #ffff;
    }

    .pl__ring--d {
        animation-name: ringD;
        stroke: #16A085;
    }

    /* Animations */
    @keyframes ringA {

        from,
        4% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -330;
        }

        12% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -335;
        }

        32% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -595;
        }

        40%,
        54% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -660;
        }

        62% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -665;
        }

        82% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -925;
        }

        90%,
        to {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -990;
        }
    }

    @keyframes ringB {

        from,
        12% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -110;
        }

        20% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -115;
        }

        40% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -195;
        }

        48%,
        62% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        70% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        90% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -305;
        }

        98%,
        to {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -330;
        }
    }

    @keyframes ringC {
        from {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
        }

        8% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
        }

        28% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
        }

        36%,
        58% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        66% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        86% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
        }

        94%,
        to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
        }
    }

    @keyframes ringD {

        from,
        8% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
        }

        16% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
        }

        36% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
        }

        44%,
        50% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        58% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        78% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
        }

        86%,
        to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
        }
    }
</style>
<body>
    <div class="body-spinner" id="spinner_login">
        <div class="content-spinner">
            <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
                <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none"
                    stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330"
                    stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none"
                    stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110"
                    stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none"
                    stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none"
                    stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            </svg>
        </div>
    </div>

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area shadow">
        <!-- Start Topbar -->
        @if (Request::is('/', 'home'))
        <div class="topbar" style="border-bottom: 1px solid #16A085;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            @auth
                            @hasrole('pembeli')
                            <a onclick="pembeli('{{ route('pembeli') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @elserole('gapoktan')
                            <a onclick="gapoktan('{{ route('gapoktan') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @elserole('poktan')
                            <a onclick="poktan('{{ route('poktan') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @elserole('petani')
                            <a onclick="petani('{{ route('petani') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @elserole('admin')
                            <a onclick="admin('{{ route('admin') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @elserole('support')
                            <a onclick="support('{{ route('support') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                            @endhasrole
                            @else
                            <ul class="user-login">
                                <li>
                                    <a class="btn" style="background: #16A085; color: #ffff;"
                                        onclick="login('{{ route('login') }}')" href="#">Masuk</a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a style="cursor: pointer; background: #16A085; color: #ffff;" class="btn"
                                            data-toggle="dropdown" aria-expanded="false">Daftar</a>
                                        <div class="dropdown-menu mt-2">
                                            <a class="dropdown-item" onclick="register('{{ url('/register') }}')"
                                                href="#">Sebagai Pembeli</a>
                                            <a class="dropdown-item"
                                                onclick="registerGapoktan('{{ url('/gapoktan/register') }}')"
                                                href="#">Sebagai Gapoktan</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle" style="border-bottom: 1px solid #16A085;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" onclick="home('{{ url('home') }}')" href="#">
                            <h3 style="color: #16A085">TaniKula</h3>
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form action="{{ url('/search-product') }}">
                                <div class="navbar-search search-style-5">
                                    <div class="search-input">
                                        <input type="search" style="border: 1px solid #16A085;" class="form-control typeaheadProduct"
                                            value="{{ request('pencarian') }}" name="pencarian"
                                            placeholder="Pencarian produk" autocomplete="off">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+62) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="notification-items">
                                    @php
                                    $notificationsSum =
                                    App\Models\PushNotification::where('user_id',Auth::id())->sum('is_read', 0);
                                    $notifications = App\Models\PushNotification::where('user_id',
                                    Auth::id())->latest()->get();
                                    @endphp
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-alarm"></i>
                                        <span class="total-items notif-count">0</span>
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header" style="border-bottom: 1px solid #16A085;">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span>Pemberitahuan (<span class="notif-count">0</span>)</span>
                                                <form action="#" id="readNotif" method="get">
                                                    @csrf
                                                    <button style="color:#16A085;"
                                                        class="p-0 bg-white btn btn-sm shadow-none border-white fw-bold"
                                                        type="submit">Baca Semua</button>
                                                </form>
                                            </div>
                                        </div>
                                        <ul class="shopping-list"
                                            id="{{ $notifications->count() > 2 ? 'style-1' : ''}}">
                                            @if ($notifications->count() > 0)
                                            @foreach ($notifications as $notif)
                                            <li class="border p-2 rounded"
                                                style="{{ $notif->is_read == 0 ? 'background: antiquewhite' : '' }}; border: 1px solid #16A085;">
                                                {{-- <input type="hidden" name="passingIdNotif" value="{{ $notif->id }}">
                                                --}}
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="">
                                                        <img src="{{ asset('img/'.$notif->img) }}" alt="#"
                                                            style="width: 5rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                    </a>
                                                </div>

                                                <div class="content">
                                                    <h4><a style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                                                            href="#">
                                                            {{ $notif->title }}</a></h4>
                                                    <span class="small"
                                                        style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{ $notif->body }}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <div id="app">
                                                <div class="container">
                                                    <div class="page-error-notification">
                                                        <div class="page-inner-notification">
                                                            <img src="{{ asset('img/undraw_empty_re_opql.svg') }}"
                                                                alt="">
                                                            <div class="page-description-notification">
                                                                Tidak ada pemberitahuan!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                {{-- ===========
                                Cart
                                ============ --}}

                                <div class="cart-items">
                                    <!-- Shopping Item -->
                                    @php
                                    $cartItemSum = App\Models\Cart::with('product')
                                    ->join('products', 'carts.product_id', 'products.id')
                                    ->select('carts.*', 'products.name as name')
                                    ->where('carts.user_id', Auth::id())
                                    ->where('products.stoke', '!=', 0)
                                    ->sum('product_qty');

                                    $cartItem = App\Models\Cart::with('product')
                                    ->join('products', 'carts.product_id', 'products.id')
                                    ->select('carts.*', 'products.name as name')
                                    ->where('carts.user_id', Auth::id())
                                    ->where('products.stoke', '!=', 0)
                                    ->orderBy('products.updated_at', 'desc')
                                    ->get();

                                    $cartItemOutOfStock = App\Models\Cart::with('product')
                                    ->join('products', 'carts.product_id', 'products.id')
                                    ->select('carts.*', 'products.name as name')
                                    ->where('carts.user_id', Auth::id())
                                    ->where('products.stoke', '=', 0)
                                    ->orderBy('products.updated_at', 'desc')
                                    ->get();
                                    @endphp
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items cart-count">0</span>
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header" style="border-bottom: 1px solid #16A085;">
                                            <span>Keranjang (<span class="cart-count">0</span>)</span>
                                            <a style="color:#16A085;" href="{{ url('cart') }}">Lihat Sekarang</a>
                                        </div>
                                        @php
                                        $total = 0;
                                        @endphp
                                        <form action="{{ route('checkout.pembeli') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <ul class="shopping-list" id="{{ $cartItem->count() > 1 ? 'style-2' : ''}}">
                                                @if ($cartItem->count() == 0 && $cartItemOutOfStock->count() == 0)
                                                <div id="app">
                                                    <div class="container">
                                                        <div class="page-error-notification">
                                                            <div class="page-inner-notification">
                                                                <img src="{{ asset('img/undraw_empty_re_opql.svg') }}"
                                                                    alt="">
                                                                <div class="page-description-notification">
                                                                    Tidak ada produk dikeranjang!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @foreach ($cartItem as $item)
                                                <div class="d-flex navbarCheckProductCart">
                                                    <input class="form-check-input" type="checkbox" name="navbar_cart_id[]"
                                                        value="{{ $item->id }}" id="navbarCheckProductCart">
                                                    <input class="form-check-input" type="hidden" name="navbar_cart_qty"
                                                        value="{{ $item->product_qty }}" id="navbarCheckProductQty">
                                                    <input class="form-check-input" type="hidden" name="navbar_cart_total"
                                                        value="{{ $item->product->price }}" id="navbarCheckProductTotal">
                                                    <p class="fw-bold ps-3 mb-2 col-10"
                                                        style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">
                                                        <i class="bi bi-shop"></i> {{ $item->product->user->name }}
                                                    </p>
                                                </div>
                                                <li>
                                                    <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                                    {{-- <button class="remove delete-cart-item" title="Remove this item"><i
                                                            class="lni lni-close"></i></button> --}}
                                                    <div class="cart-img-head">
                                                        <a class="cart-img" href="{{ url('home/'.$item->product->slug) }}">
                                                            @if ($item->product->photo_product->count() > 0)
                                                            @foreach ($item->product->photo_product->take(1) as $photos)
                                                            @if ($photos->name)
                                                            <img src="{{ asset('../storage/produk/'.$photos->name) }}"
                                                                alt="{{ $item->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @else
                                                            <img src="{{ asset('img/no-image.png') }}"
                                                                alt="{{ $item->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @endif
                                                            @endforeach
                                                            @else
                                                            <img src="{{ asset('img/no-image.png') }}"
                                                                alt="{{ $item->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <div class="content">
                                                        <h4><a style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                                                                href="{{ url('home/'.$item->product->slug) }}">
                                                                {{ $item->product->name }}</a></h4>
                                                        <p class="quantity">{{ $item->product_qty }}x - <span
                                                                class="amount">Rp.
                                                                {{ number_format($item->product->price, 0) }}</span></p>
                                                    </div>
                                                </li>
                                                @php
                                                $total += $item->product->price * $item->product_qty;
                                                @endphp
                                                @endforeach

                                                {{-- ========================= --}}
                                                {{-- Jika Stok Kosong --}}
                                                {{-- ================================== --}}
                                                @if ($cartItemOutOfStock->count() > 0)
                                                <div class="mb-2 pb-1 d-flex align-items-center border-bottom fw-bold"><i
                                                        class="bi bi-bag-x pe-2"></i> Produk tidak valid</div>
                                                @endif
                                                @foreach ($cartItemOutOfStock as $itemOutOfStock)
                                                <div style="opacity: 70%;" class="d-flex navbarCheckProductCart">
                                                    <input class="form-check-input" type="checkbox" disabled>
                                                    <p class="fw-bold ps-3 mb-2 col-10"
                                                        style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">
                                                        <i class="bi bi-shop"></i>
                                                        {{ $itemOutOfStock->product->user->name }}
                                                    </p>
                                                </div>
                                                <li style="opacity: 70%;">
                                                    <div class="cart-img-head">
                                                        <a class="cart-img"
                                                            href="{{ url('home/'.$itemOutOfStock->product->slug) }}">
                                                            @if ($itemOutOfStock->product->photo_product->count() > 0)
                                                            @foreach ($itemOutOfStock->product->photo_product->take(1) as
                                                            $photos)
                                                            @if ($photos->name)
                                                            <img src="{{ asset('../storage/produk/'.$photos->name) }}"
                                                                alt="{{ $itemOutOfStock->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @else
                                                            <img src="{{ asset('img/no-image.png') }}"
                                                                alt="{{ $itemOutOfStock->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @endif
                                                            @endforeach
                                                            @else
                                                            <img src="{{ asset('img/no-image.png') }}"
                                                                alt="{{ $itemOutOfStock->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <div class="content">
                                                        <h4><a style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                                                                href="{{ url('home/'.$itemOutOfStock->product->slug) }}">
                                                                {{ $itemOutOfStock->product->name }}</a></h4>
                                                        <p class="quantity">{{ $itemOutOfStock->product_qty }}x - <span
                                                                class="amount">Rp.
                                                                {{ number_format($itemOutOfStock->product->price, 0) }}</span>
                                                        </p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount d-flex align-items-center">Rp. <p
                                                            class="navbar-total-price ps-2 py-0 pe-0 m-0">0</p></span>
                                                </div>
                                                <div class="button">
                                                    @if ($cartItem->count())
                                                    <button type="submit" style="background: #16A085"
                                                        class="btn animate">Checkout (<span
                                                            class="navbar-beli-keranjang-count">0</span>)</a>
                                                        @else
                                                        <a href="{{ url('new-product') }}" class="btn animate">Belanja
                                                            Sekarang</a>
                                                        @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu" style="border-right: 1px solid #16A085;">
                            @php
                            $category_product = App\Models\ProductCategory::where('is_active', '=', 1)->get();
                            @endphp
                            <a href="#" class="nav-link text-black fw-bold" data-bs-display="static"
                                data-bs-toggle="dropdown"><i class="lni lni-menu text-black fw-bold pe-2"></i>Semua
                                Kategori</a>
                            <div class="dropdown-menu">
                                <div class="row" style="width: 46rem">
                                    @foreach ($category_product as $item)
                                    <div class="col-4">
                                        <a href="{{ url('product-category/'.$item->slug) }}"
                                            class="dropdown-item">{{ $item->name }}</a>
                                    </div>
                                    @endforeach
                                    <div class="col-4">
                                        <a href="{{ url('product-category/all-category') }}" class="dropdown-item">Semua
                                            Kategori</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a onclick="home('{{ url('home') }}')" href="#"
                                            class="{{ Request::is('home') ? 'active' : '' }}"
                                            aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a onclick="hubungi_kami('{{ url('hubungi-kami') }}')" href="#"
                                            class="{{ Request::is('hubungi-kami') ? 'active' : '' }}"
                                            aria-label="Toggle navigation">Hubungi kami</a>
                                    </li>
                                    <li class="nav-item d-block d-md-none mt-md-0 mt-3">
                                        <div class="main-menu-search-mobile">
                                            <!-- navbar search start -->
                                            <form action="{{ url('/search-product') }}">
                                                <div class="navbar-search-mobile search-style-5">
                                                    <div class="search-input-mobile">
                                                        <input type="search" class="form-control typeaheadProduct"
                                                            value="{{ request('pencarian') }}" name="pencarian"
                                                            placeholder="Pencarian produk" autocomplete="off">
                                                    </div>
                                                    <div class="search-btn-mobile">
                                                        <button type="submit"><i
                                                                class="lni lni-search-alt"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- navbar search Ends -->
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Ikuti Kami:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs shadow-none" style="border-top: 1px solid #16A085;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">
                                @if ( request('pencarian') )
                                <h1 class="page-title">{{ substr(request('pencarian'), 0, 20). '...' }}</h1>
                                @else
                                @yield('breadcrumb-subTitle')
                                @endif
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ url('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>@yield('breadcrumb-title')</li>
                            @if ( request('pencarian') )
                            <li>{{ substr(request('pencarian'), 0, 20). '...' }}</li>
                            @else
                            <li class="fw-bold">@yield('breadcrumb-subTitle')</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </header>
    <!-- End Header Area -->


    @yield('content')

    @include('components.pages.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top border border-white">
        <i class="lni lni-chevron-up"></i>
    </a>

    @include('components.pages.footerJS')
</body>

</html>
