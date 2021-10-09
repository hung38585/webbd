<footer id="fh5co-footer" role="contentinfo" style="margin-top: 40px;">
    <div class="container">
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p style="margin-top: 10px; margin-bottom: 0;"><a href="/" style="font-family: Montserrat,sans-serif;font-size: 25px;">{{ $infomation->name }}</a></p>
                <p style="color: #5c5c5c;">
                </p>
                <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="/ve-chung-toi">GIỚI THIỆU</a></li>
                        <li><a href="/san-pham">SẢN PHẨM</a></li>
                        <li><a href="/lien-he">LIÊN HỆ</a></li>
                        <li><a href="/lien-he">TIN TỨC</a></li>
                        <li><a href="/phan-hoi">CẨM NANG</a></li>
                    </ul>
                </p>
                <p>
                <ul class="fh5co-social-icons">
                    <li class="address" style="margin-right: 10px;"><i class="fas fa-map-marker-alt"></i> {{ $infomation->address }}</li>
                    <li class="phone" style="margin-right: 10px;"><i class="fas fa-phone"></i> {{ $infomation->phone }}</li>
                    <li class="email" style="margin-right: 10px;"><i class="fas fa-envelope"></i> {{ $infomation->mail }}</li>
                    <li><i class="fab fa-facebook-square"></i><a href="{{ $infomation->facebook }}" target="_blank" style="color: #828282; padding-left: 4px;">Facebook</a></li>
                </ul>
                </p>
                <p>
            </div>
        </div>
    </div>
</footer>