@extends('client.shared.main')
@section('title', 'Sản phẩm')
@section('content')
<div id="fh5co-gallery" class="fh5co-section-gray">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
        <div class="row row-bottom-padded-md">
            <div class="col-lg-2 col-md-3">
                <h2 style="color: #5c5c5c;">Danh mục</h2>
                <form action="/san-pham" method="GET" id="filter-form">
                    <input type="hidden" value="{{ isset($_GET['keyword']) ? $_GET['keyword']: '' }}" name="keyword">
                    @foreach ($categories as $key => $category)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" onchange="checkCategory()" class="custom-control-input category-checkbox" id="customCheck{{$key}}" name="category[]" value="{{$category->slug}}" {{ isset($_GET['category']) && in_array($category->slug, $_GET['category']) ? 'checked': '' }}>
                        <label class="custom-control-label" for="customCheck{{$key}}" style="font-weight: normal;">
                            {{$category->name}}
                        </label>
                    </div>
                    @endforeach 
                </form>
            </div>
            <div class="col-lg-10 col-md-9">
                <h2 style="color: #5c5c5c; text-align: center;">Sản phẩm</h2>
                <ul id="fh5co-gallery-list">
                    @foreach ($products as $key => $product)
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
                <!-- paginate -->
                <div class="col-md-12 animate-box">
                    {{$products->links('client.shared.paginate')}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkCategory() {
        document.getElementById('filter-form').submit();
    }
</script>
@endsection