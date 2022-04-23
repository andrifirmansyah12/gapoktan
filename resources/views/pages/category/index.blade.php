@extends('pages.template1')
@section('title', 'Kategori Produk')

@section('style')
    <style>
        /*  */
    </style>
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $category_product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Kategori Produk</a></li>
                        <li>{{ $category_product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Trending Product Area -->
    <section class="section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                @foreach ($product as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <a href="{{ url('product-category/'.$category_product->slug.'/'.$item->slug) }}">
                                @if ($item->image)
                                    <img src="{{ asset('../storage/produk/'.$item->image) }}" alt="{{ $item->name }}" style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @else
                                    <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}" style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @endif
                            </a>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                    Keranjang</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{ $item->product_category->name }}</span>
                            <h4 class="title">
                                <a href="{{ url('product-category/'.$category_product->slug.'/'.$item->slug) }}">{{ $item->name }}</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Ulasan(40)</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp. {{ number_format($item->price, 0) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

@endsection

@section('script')
<script>
    //
</script>
@endsection