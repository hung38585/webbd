@extends('client.shared.main')
@section('title', $infomation->name)
@section('content')
<!--bxslider CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/jquery.bxslider.min.css')}}">
<!-- owl.carousel CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/owl.carousel.css')}}">
<!-- responsive CSS ============================================ -->
<link rel="stylesheet" href="{{asset('slide/css/responsive.css')}}">
<style>
    .product_left #bx-pager img {
        opacity: 0.4;
        transition: all 0.4s ease 0s;
    }

    .product_left #bx-pager .active img {
        border: 1px solid #ccc !important;
        opacity: 1;
    }

    .product_left .bx-wrapper {
        box-shadow: none;
        margin-bottom: 0;
    }

    .product_info .name {
        font-size: 25px;
    }
</style>
<!-- <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('usertemplate/images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5"> -->
<header id="fh5co-header" class="fh5co-cover" role="banner" style="" data-stellar-background-ratio="0.5">
    <div class="mySlides fade-slide">
        <img src="https://samngoclinhkontum.com/wp-content/uploads/2019/03/gioi-thieu-ve-cay-sam-ngoc-linh-03.jpg" style="width:100%">
        <!-- <div class="text">Nội Dung 2</div> -->
    </div>
</header>

<!-- <div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('usertemplate/images/img_bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <span>Our Special Events</span>
                <h2>Wedding Events</h2>
            </div>
        </div>
        <div class="row">
            <div class="display-t">
                <div class="display-tc">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-6 col-sm-6 text-center">
                            <div class="event-wrap animate-box">
                                <h3>Main Ceremony</h3>
                                <div class="event-col">
                                    <i class="icon-clock"></i>
                                    <span>4:00 PM</span>
                                    <span>6:00 PM</span>
                                </div>
                                <div class="event-col">
                                    <i class="icon-calendar"></i>
                                    <span>Monday 28</span>
                                    <span>November, 2016</span>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 text-center">
                            <div class="event-wrap animate-box">
                                <h3>Wedding Party</h3>
                                <div class="event-col">
                                    <i class="icon-clock"></i>
                                    <span>7:00 PM</span>
                                    <span>12:00 AM</span>
                                </div>
                                <div class="event-col">
                                    <i class="icon-calendar"></i>
                                    <span>Monday 28</span>
                                    <span>November, 2016</span>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div id="fh5co-couple-story">
    <div class="container" style="margin-bottom: 30px; margin-top: 40px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Về chúng tôi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <ul class="timeline animate-box">
                    @foreach ($abouts as $key => $about)
                    <li class="animate-box {{ $key%2 == 1 ? 'timeline-inverted' : '' }}">
                        <div class="timeline-badge" style="background-image:url({{asset('images/' . $about->image)}});"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body">
                            {!! $about->content, 750 !!}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- List album comment -->
<div id="fh5co-gallery">
    <div class="container" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>SẢN PHẨM</h2>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-gallery-list">
                    @foreach($products as $key => $product)
                    <li class="one-third animate-box" data-animate-effect="fadeIn">
                        <a href="{{route('san-pham.show',$product->slug)}}">
                            <div class="product-image-item" style="background-image: url({{asset('images/' . $product->image[0]->url)}}); background-size: 100% 100%; border-radius: 5px;">
                            </div>
                            <div>
                                <p class="product-name">{{ $product->name }} </p>
                                <p class="product-price" style="font-weight: bold;">
                                @if ($product->promotion)
                                {{ number_format($product->promotion) }} đ <span style="font-weight: normal;"><strike>{{ number_format($product->price) }} đ</strike></span>
                                @else
                                {{ number_format($product->price) }} đ
                                @endif
                            </p>
                            </div>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <a href="/san-pham" class="btn" style="border: 1px solid; padding: 5px 15px;">Xem toàn bộ sản phẩm</a>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-services" class="fh5co-section-gray">
    <div class="container">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-6">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Cẩm nang</h2>
                    </div>
                </div>
                @foreach ($shares as $key => $share)
                <div class="feature-left animate-box" data-animate-effect="fadeInLeft" style="margin-bottom: 20px;">
                    <a href="{{url('/cam-nang/' . $share->slug)}}">
                    <div>
                        <img src="{{asset('images/' . $share->image)}}" alt="" style="width: 100%;">
                    </div>
                    <div style="margin-top: 10px;">
                        <p style="font-weight: bold;; margin: 0;">{{ $share->title }}</p>
                    </div>
                    </a>
                </div>
                @endforeach
                <div class="col-md-12 text-center animate-box">
                    <a href="/cam-nang" class="btn" style="border: 1px solid; padding: 5px 15px;">Xem toàn bộ</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Tin tức</h2>
                    </div>
                </div>
                @foreach ($news as $key => $new)
                <div class="feature-left animate-box" data-animate-effect="fadeInLeft" style="margin-bottom: 20px;">
                    <a href="{{url('/tin-tuc/' . $new->slug)}}">
                    <div>
                        <img src="{{asset('images/' . $new->image)}}" alt="" style="width: 100%;">
                    </div>
                    <div style="margin-top: 10px;">
                        <p style="font-weight: bold;  margin: 0;">{{ $new->title }}</p>
                    </div>
                    </a>
                </div>
                @endforeach
                <div class="col-md-12 text-center animate-box">
                    <a href="tin-tuc" class="btn" style="border: 1px solid; padding: 5px 15px;">Xem toàn bộ</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }


        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
@endsection