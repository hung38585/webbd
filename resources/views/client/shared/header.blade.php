<div style="width: 100%;background: green;">
    <span style="color: white;margin: 0px 30px;">Hotline: {{ $infomation->phone }}</span> 
</div>
<nav class="fh5co-nav" role="navigation">
        <div class="row">
            <div class="col-md-5 text-right menu-1">
                <ul style="margin-top: 30px;">
                    <li><a href="/ve-chung-toi">GIỚI THIỆU</a></li>
                    <li><a href="/san-pham">SẢN PHẨM</a></li>
                    <li><a href="/lien-he">LIÊN HỆ</a></li>
                    <li><a href="/tin-tuc">TIN TỨC</a></li>
                    <li><a href="/cam-nang">CẨM NANG</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <a href="/"><img src="{{ asset('images/logo.png') }}" alt="Sâm ngọc linh" style="width: 50%; margin-left: 25%;"></a>
            </div>
            <div class="col-md-5">
                <ul style="margin-top: 30px;">
                    <li>
                        <form action="/san-pham" method="get">
                            <input type="name" class="form-control input-search-product" name="keyword" value="{{ isset($_GET['keyword']) ? $_GET['keyword']: '' }}" placeholder="Tên sản phẩm" style="float: left; margin-left: 10px;">
                            <button type="submit" class="btn btn-success" style="float: left; margin-left: 2px;border-radius: 5px;"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                    <li><a href="{{route('gio-hang.index')}}"><i class="fas fa-cart-plus text-success" style="font-size: 36px; padding-top: 4px;padding-left: 100px;"></i></a></li>
                </ul> 
            </div>
            
        </div>
</nav>
