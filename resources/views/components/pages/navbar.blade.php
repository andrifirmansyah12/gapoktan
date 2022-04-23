<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    @if (Request::is('/', 'home'))
        <div class="topbar" style="border-bottom: 1px solid #eee;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            {{-- <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            {{-- <ul class="useful-links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">Masuk</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">Daftar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        <h3>Sri Makmur</h3>
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-envelope"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-alarm"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">2</span>
                                </a>
                                <!-- Shopping Item -->
                                @php
                                    $cartItem = App\Models\Cart::where('user_id', Auth::id())->get();
                                @endphp
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="{{ url('cart') }}">Lihat Keranjang</a>
                                    </div>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cartItem as $item)
                                    <ul class="shopping-list" id="product_data">
                                        <li>
                                            <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                            <button class="remove delete-cart-item"
                                                title="Remove this item"><i class="lni lni-close"></i></button>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="{{ asset('../storage/produk/'.$item->product->image) }}"
                                                        alt="#" style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="product-details.html">
                                                        {{ $item->product->name }}</a></h4>
                                                <p class="quantity">{{ $item->product_qty }}x - <span
                                                        class="amount">Rp. {{ number_format($item->product->price, 0) }}</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    @php
                                        $total += $item->product->price * $item->product_qty;
                                    @endphp
                                    @endforeach
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">Rp. {{ number_format($total, 0) }}</span>
                                        </div>
                                        <div class="button">
                                            <a href="checkout.html" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
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
</header>
<!-- End Header Area -->
