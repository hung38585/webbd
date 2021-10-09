@extends('client.shared.main')
@section('title', $product->name)
@section('content')
<!--bxslider CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/jquery.bxslider.min.css')}}">
<!-- owl.carousel CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/owl.carousel.css')}}">
<!-- responsive CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/responsive.css')}}">
<style>
    .product_left #bx-pager img {opacity: 0.4;transition: all 0.4s ease 0s;}
    .product_left #bx-pager .active img { border: 1px solid #ccc !important; opacity: 1;}
    .product_left .bx-wrapper { box-shadow: none; margin-bottom: 0; }
    .product_info .name {font-size: 25px;}
</style>
<div id="fh5co-gallery" class="fh5co-section-gray">
    <div class="container">
        <div class="product-detail">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('wedding.home_page') }}</a></li>
                <li class="breadcrumb-item"><a href="/san-pham">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                {{ $product->name }}
                </li>
            </ol>
        </nav>
        <!--PRODUCT CATEGORY START -->
        <div class="blog_right_sidebar_area product_category product_left ">
            <div class="container">
                <div class="row">
                        <div class="row">
                            <div class="product_gallery_img">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="product_gallery">
                                        <button class="button-zoom-image btn" onclick="return openModalImage()"><i class="fas fa-expand-arrows-alt"></i></button>
                                        <a href=""></a>
                                        <ul id="gallery_imgs">
                                            @foreach($images as $key => $image)
                                            <li>
                                                <img src="{{asset('images/' . $image->url)}}" alt="" />
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="bxpage_slider" id="bx-pager">
                                            @foreach($images as $key => $image)
                                            <a data-slide-index="{{$key}}" data-image-src="" href="{{asset('images/' . $image->url)}}"><img src="{{asset('images/' . $image->url)}}" class="image-thumb" alt="Váy cưới đà nẵng" /></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="product_info">
                                        <div class="info">
                                            <p class="name" style="color: #4a4849;">{{ $product->name }}</p>
                                            <p style="font-size: 30px; color: black;">
                                            @if ($product->promotion)
                                            {{ number_format($product->promotion) }} đ <span style="font-weight: normal;font-size: 20px;color: #524f4f;"><strike>{{ number_format($product->price) }} đ</strike></span>
                                            @else
                                            {{ number_format($product->price) }} đ
                                            @endif
                                            </p>
                                            <div class="product_meta">
                                                <span class="posted_in">
                                                    <span class="product-detail-item">{{ __('wedding.category') }}: </span>
                                                    <span style="color: #4a4849;">{{ $product->category->name }}</span> 
                                                </span>
                                            </div>
                                            <div class="product_meta" style="margin-top: 20px;">
                                                <form action="{{route('gio-hang.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="col-md-12">
                                                        <input type="button" class="btn-success" onclick="changeQuantity('minus')" value="-" style="width: 30px;border-radius: 5px;">
                                                        <input type="number" value="1" max="100" min="1" id="product_quantity" name="product_quantity" style="width: 45px;">
                                                        <input type="button" class="btn-success" onclick="changeQuantity('plus')" value="+" style="width: 30px;border-radius: 5px;">
                                                    </div>
                                                    <button class="btn btn-success" style="margin-top: 20px;">Thêm vào giỏ hàng</button>
                                                </form>
                                                @if(session('success'))
                                                <div class="alert alert-success text-center notification" >
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                @if(session('already_exist'))
                                                <div class="alert alert-danger text-center notification" >
                                                    {{ session('already_exist') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 50px;">
                                   {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                        <!-- RELATED  PRODUCS  -->
                        <div class="featured_producs related_product fh5co-heading text-center" style="margin-top: 50px;">
                            <div>
                                <h2>SẢN PHẨM CÙNG DANH MỤC</h2>
                            </div>
                            <div class='slider8'>
                                @foreach($productRelates as $key => $productRelate)
                                <div class="single_item" style="width: 98%;">
                                    <div class='item'>
                                        <a href="{{route('san-pham.show',$productRelate->slug)}}" class="related-products">
                                        <div class="product_img">
                                            <img src="{{asset('images/' . $productRelate->image[0]->url)}}" alt="Váy cưới đà nẵng" style="border-radius: 5px;" />
                                        </div>
                                        <div style="text-align: left;">
                                            {{ $productRelate->name }}
                                            <p class="product-price" style="font-weight: bold; font-size: 15px;">
                                            @if ($productRelate->promotion)
                                            {{ number_format($productRelate->promotion) }} đ <span style="font-weight: normal;"><strike>{{ number_format($productRelate->price) }} đ</strike></span>
                                            @else
                                            {{ number_format($productRelate->price) }} đ
                                            @endif
                                            </p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Related Products PRODUCS END  -->
                </div>
            </div>
        </div>
        <!--PRODUCT CATEGORY END -->
        </div>
    </div>
    <!-- The Modal -->
    <div id="modal-image-preview" class="modal-image-slide mb-5">
        <!-- The Close Button -->
        <span class="close-modal-image">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-image-slide-content" id="image-on-modal">
    </div>
</div>
<script>
    function changeQuantity(mode) {
        var quantity = parseInt(document.getElementById('product_quantity').value);
        if (quantity) {
            mode == 'plus' ? quantity++ : quantity--; 
        }
        (quantity > 0 && quantity < 100) && (document.getElementById('product_quantity').value = quantity);
    }
</script>
<!-- ALL JS FILES -->
<!-- jquery js -->
<script src="{{asset('slide/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- owl.carousel.min js -->
<script src="{{asset('slide/js/owl.carousel.min.js')}}"></script>
<!-- bxslider js -->
<script src="{{asset('slide/js/jquery.bxslider.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('slide/js/wow.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('slide/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('slide/js/main.js')}}"></script>
<!-- modal image js -->
<script src="{{asset('slide/js/modalimage.js')}}"></script>
@endsection